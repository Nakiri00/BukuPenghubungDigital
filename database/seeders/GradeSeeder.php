<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder {
    public function run(): void {
        DB::table('grades')->delete();
        DB::table('grades')->insert([
            ['id' => 1, 'grade' => '1'],
            ['id' => 2, 'grade' => '2'],
            ['id' => 3, 'grade' => '3'],
            ['id' => 4, 'grade' => '4'],
            ['id' => 5, 'grade' => '5'],
            ['id' => 6, 'grade' => '6'],
        ]);
    }
}