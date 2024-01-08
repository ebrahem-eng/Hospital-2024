<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'room1',
            'code' => '332',
            'status' => '1',
            'created_by' => '1',
            'department_id' => '1',
            'type' => 'operation',
            'floor_id' => '1',
        ]);
    }
}
