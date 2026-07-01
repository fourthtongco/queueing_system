<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([

            // -----------------------------------------------
            // REGISTRAR
            // code = 'REG' → ticket numbers: REG-0001, REG-0002
            // -----------------------------------------------
            [
                'department_name' => "Registrar's Office",
                'code'            => 'REG',
                'description'     => 'Handles student records, enrollment, document requests, and transcript of records.',
                'status'          => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

            // -----------------------------------------------
            // ACCOUNTING
            // code = 'ACC' → ticket numbers: ACC-0001, ACC-0002
            // -----------------------------------------------
            [
                'department_name' => 'Accounting Office',
                'code'            => 'ACC',
                'description'     => 'Handles tuition payments, school fees, scholarships, and financial concerns.',
                'status'          => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],

        ]);
    }
}