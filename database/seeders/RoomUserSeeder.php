<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rooms = Room::all();
        $now = Carbon::now();

        foreach($rooms as $room) {

            $users = DB::table('users')
                ->whereNot('id', $room->user_id)
                ->inRandomOrder()
                ->limit(rand(1, 5))
                ->get();

            $room_user_data = [];
            foreach($users as $user) {
                $room_user_data[] = [
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('room_users')->insert([
                'user_id' => $room->user_id,
                'room_id' => $room->id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('room_users')->insert($room_user_data);

        }
    }
}
