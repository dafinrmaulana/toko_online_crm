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
        $users = Admin::where('role', 'user')->get()->all();

        if ($user->role === 'admin') {
            $chats = Chat::get()->all();
            // $chats->each(function($chat) {

            // })
        }

        if ($user->role === 'user') {
            $chats = Chat::where('user_id', $user->id)->get()->all();
        }

        return view('user.chat.index2', compact(
            'user', 
            'users',
            'chats'
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
