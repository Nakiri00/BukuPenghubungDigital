<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder {
    public function run(): void {
        DB::table('students')->insert([
            ['id' => 21, 'parent_id' => 65, 'parent_name' => 'Orang Tua 1', 'nisn' => '1234', 'name' => 'Budi Santoso', 'dob' => '2019-01-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan DEFG', 'grade_id' => 2, 'status' => 1],
            ['id' => 22, 'parent_id' => 66, 'parent_name' => 'Orang Tua 2', 'nisn' => '12345', 'name' => 'Kevin', 'dob' => '2020-06-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan EFG', 'grade_id' => 2, 'status' => 1],
            ['id' => 23, 'parent_id' => 67, 'parent_name' => 'Orang Tua 3', 'nisn' => '123456', 'name' => 'Satria', 'dob' => '2020-05-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan FGH', 'grade_id' => 2, 'status' => 1],
            ['id' => 24, 'parent_id' => 68, 'parent_name' => 'Orang Tua 4', 'nisn' => '123456', 'name' => 'Rayhan', 'dob' => '2021-12-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan GHI', 'grade_id' => 3, 'status' => 1],
            ['id' => 25, 'parent_id' => 69, 'parent_name' => 'Orang Tua 5', 'nisn' => '1234567', 'name' => 'Ikhsan', 'dob' => '2019-12-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan IJK', 'grade_id' => 3, 'status' => 1],
            ['id' => 26, 'parent_id' => 70, 'parent_name' => 'Orang Tua 6', 'nisn' => '12345678', 'name' => 'Faiz', 'dob' => '2020-07-03', 'gender' => 'Laki-Laki', 'nationality' => 'WNI', 'religion' => 'Islam', 'address' => 'Jalan JKI', 'grade_id' => 3, 'status' => 1],
        ]);
    }
}