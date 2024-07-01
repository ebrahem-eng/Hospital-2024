<?php

namespace Database\Seeders;

use App\Models\DoctorTimeAvailable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorAvailableTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DoctorTimeAvailable::create([
            'dayName' => 'Sunday',
            'startTime' => '01:00:00',
            'endTime' => '02:00:00',
            'inspectionDuration'=> '15',
            'doctorID' => '1'
        ]);
    }
}
