<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            $chats = Chat::get()->all();
            $users = Admin::where('role', 'user')->get();

            $users->each(function($member) {
                $member['chats'] = $member->chats;
            });

            $chatLatest = Admin::where('role', 'user')->with('chats')->first();
        }

        if ($user->role === 'user') {
            $chats = Chat::where('user_id', $user->id)->get()->all();
            $users = Admin::where('role', 'admin')->first();

            $chatLatest = NULL;
        }

        return view('user.chat.index2', compact(
            'user', 
            'users',
            'chats',
            'chatLatest'
        ));
    }

    public function getChatUser()
    {
        $chats = Chat::get();

        $chats->each(function($chat) {
            $chat['user'] = $chat->user;
            $chat->chat_replies->map(function ($row) {
                $row->created_at_formated = date('H:i d-m-y', strtotime($row->created_at));
            });
        });

        return $chats;
    }

    public function storeChatUser(Request $request)
    {
        Chat::create([
            'admin_id' => $request->user_id,
            'message' => $request->message
        ]);

        return response()->json([
            'status' => 'Success'
        ]);
    }

    public function storeReplyChatUser(Request $request, Chat $chat)
    {
        $chat->chat_replies()->create([
            'admin_id' => $request->user_id,
            'message' => $request->message
        ]);

        return response()->json([
            'status' => 'Success'
        ]);
    }
}
