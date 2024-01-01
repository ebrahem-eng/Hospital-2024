<?php

namespace Database\Seeders;

use App\Models\MedicalMachine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MedicalMachine::create([
            'name' => 'medicalMachine1',
            'status' => '1',
            'quantity' => '10',
            'details' => 'no details',
            'img' => 'img1',
            'created_by' => '1',
        ]);
    }
}
