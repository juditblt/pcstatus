<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room1 = new Room();
        $room1->name = "209";
        $room1->width = 800;
        $room1->height = 1000;
        $room1->save();

        $room2 = new Room();
        $room2->name = "101";
        $room2->width = 800;
        $room2->height = 600;
        $room2->save();
    }
}
