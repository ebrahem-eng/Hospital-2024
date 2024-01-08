<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StoreKeeper;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        $this->call(AdminSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(ReceptionSeeder::class);
        $this->call(StoreKeeperSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DepartmentEmployeSeeder::class);
        $this->call(NurseSeeder::class);
        $this->call(FloorSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(ComplaintsSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(MedicalMachineSeeder::class);
        $this->call(MedicalSuppliesSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(PatientMedicalRecordSeeder::class);
    }
}
