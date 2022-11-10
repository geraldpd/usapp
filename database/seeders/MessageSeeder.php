<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_users = DB::table('room_users')->get()->shuffle();
        $now = Carbon::now();
        foreach($room_users as $index => $room_user) {
            Message::factory(rand(1,5))->create([
                'room_id' => $room_user->room_id,
                'user_id' => $room_user->user_id,
                'created_at' => $now->addDay($index)->parse(),
            ]);
        }
    }
}
