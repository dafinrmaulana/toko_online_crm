<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chats = [
            [
                'admin_id' => Admin::where('role', 'user')->get()[0]->id,
                'message' => 'Test chat',
            ],
            [
                'admin_id' => Admin::where('role', 'user')->get()[0]->id,
                'message' => 'Iya banh',
                'from_me' => false
            ],
            [
                'admin_id' => Admin::where('role', 'user')->get()[1]->id,
                'message' => 'Assalamualaikum',
            ],
            [
                'admin_id' => Admin::where('role', 'user')->get()[1]->id,
                'message' => 'Waalaikumsalam banh',
                'from_me' => false
            ],
            [
                'admin_id' => Admin::where('role', 'user')->get()[1]->id,
                'message' => 'Pa kabar ngabs?',
            ],
            [
                'admin_id' => Admin::where('role', 'user')->get()[1]->id,
                'message' => 'baik ngab',
                'from_me' => false
            ],
        ]
        Chat::create([
            'admin_id' => Admin::where('role', 'user')->first()->id,
            'message' => 'Test chat'
        ]);
    }
}
