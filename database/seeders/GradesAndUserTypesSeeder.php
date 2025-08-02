<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesAndUserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed user_types
        $userTypes = [
            ['id' => 2, 'user_type' => 'Guru'],
            ['id' => 4, 'user_type' => 'Orangtua'],
            ['id' => 100, 'user_type' => 'admin'],
        ];

        foreach ($userTypes as $type) {
            DB::table('user_types')->insert([
                'id' => $type['id'],
                'user_type' => $type['user_type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed grades
        $grades = ['1', '2', '3', '4', '5', '6'];

        foreach ($grades as $grade) {
            DB::table('grades')->insert([
                'grade' => $grade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
