<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([

            'name' => 'med1',
            'calibres' => '1000',
            'quantity' => '3',
            'price' => '2000',
            'details' => 'No Details',
            'img' => 'img1',
            'created_by' => '1',
        ]);
    }
}
