<?php

namespace Database\Seeders;

use App\Models\PatientMedicalRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientMedicalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientMedicalRecord::create([
            'doctorID' => '1',
            'paitentID' => '1',
            'created_by_doctor' => '1',
            'details' => 'No Details',
        ]);
    }
}
