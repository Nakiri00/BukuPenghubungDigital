<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCommentSeeder extends Seeder {
    public function run(): void {
        DB::table('student_comments')->insert([
            ['id' => 19, 'student_id' => 21, 'user_id' => 62, 'comment' => 'Memecahkan pot, dan terlibat perkelahian'],
        ]);
    }
}