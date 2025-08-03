<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeTeacherSeeder extends Seeder {
    public function run(): void {
        DB::table('grade_teacher')->truncate(); 
        DB::table('grade_teacher')->insert([
            ['id' => 28, 'teacher_id' => 24, 'grade_id' => 2],
            ['id' => 29, 'teacher_id' => 24, 'grade_id' => 3],
            ['id' => 30, 'teacher_id' => 24, 'grade_id' => 4],
        ]);
    }
}