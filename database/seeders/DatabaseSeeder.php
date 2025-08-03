<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTypeSeeder::class,
            UserSeeder::class,
            GradeSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            GradeTeacherSeeder::class,
            StudentsCommentSeeder::class,
        ]);
    }
}
