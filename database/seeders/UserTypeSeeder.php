<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder {
    public function run(): void {
        DB::table('user_types')->insert([
            ['id' => 2, 'user_type' => 'Guru'],
            ['id' => 4, 'user_type' => 'Orangtua'],
            ['id' => 100, 'user_type' => 'admin'],
        ]);
    }
}