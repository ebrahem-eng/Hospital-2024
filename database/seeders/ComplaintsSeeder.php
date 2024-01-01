<?php

namespace Database\Seeders;

use App\Models\Complaints;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaints::create([
            'title' => 'title 1',
            'subject' => 'subject'
        ]);
    }
}
