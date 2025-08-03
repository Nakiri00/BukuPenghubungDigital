<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder {
    public function run(): void {
        DB::table('teachers')->insert([
            ['id' => 23, 'user_id' => 62, 'nip' => '123', 'name' => 'Guru Kelas 2', 'dob' => '1990-01-03', 'gender' => 'Laki-Laki', 'teacher_type' => 'wali_kelas', 'grade_id' => 2, 'subject' => 'Mengajar semua pelajaran umum', 'address' => 'Jalan ABC', 'phone' => '081111111111'],
            ['id' => 24, 'user_id' => 63, 'nip' => '1234', 'name' => 'Guru Mapel (Agama)', 'dob' => '1988-02-03', 'gender' => 'Perempuan', 'teacher_type' => 'mapel', 'grade_id' => NULL, 'subject' => 'Agama', 'address' => 'Jalan BCD', 'phone' => '081234567890'],
            ['id' => 25, 'user_id' => 64, 'nip' => '12345', 'name' => 'Guru Kelas 3', 'dob' => '1972-09-03', 'gender' => 'Perempuan', 'teacher_type' => 'wali_kelas', 'grade_id' => 3, 'subject' => 'Mengajar semua pelajaran umum', 'address' => 'Jalan CDE', 'phone' => '081231234567'],
        ]);
    }
}