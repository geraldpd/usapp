<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Room;
use App\Models\User;
use Database\Factories\RoomFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Room::factory(10)->create();

        $users = User::factory(50)->create();

        foreach($users as $user) {
            if(rand(0,1) == 1) {
                Room::factory(rand(1,5))->create([
                    'user_id' => $user->id,
                ]);
            }
        }

        $this->call([
            RoomUserSeeder::class,
            MessageSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
