<?php

namespace Database\Seeders;

use App\Models\MedicalSupplies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalSuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicalSupplies::create([
            'name' => 'medicalSupplies1',
            'type' => 'no type',
            'status' => '1',
            'quantity' => '10',
            'details' => 'no details',
            'img' => 'img1',
            'created_by' => '1',
        ]);
    }
}
