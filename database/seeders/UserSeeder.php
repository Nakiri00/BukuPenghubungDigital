<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    public function run(): void {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => '$2y$10$G7eReTrOaZgHG2dj12JYweE6FohU80R8pXLrrsGb6xn3xjQspP.xm', 'user_type_id' => 100],
            ['id' => 62, 'name' => 'Guru Kelas 2', 'email' => '123@sekolah.com', 'password' => '$2y$10$.gy9gWaaqDfJyPLS5Ez06uPUB.MIa4DbAzJLDkbAg511sijMKJkGK', 'user_type_id' => 2],
            ['id' => 63, 'name' => 'Guru Mapel (Agama)', 'email' => 'agama@sekolah.com', 'password' => '$2y$10$X/WQ.Puyge9xpgku5OLnhuMBnbnqNWqOeFcgH3TUN2z7NFRirK1tu', 'user_type_id' => 2],
            ['id' => 64, 'name' => 'Guru Kelas 3', 'email' => '12345@sekolah.com', 'password' => '$2y$10$.B7aSCJD1iGy9aEVA35Kj.88Z2V6X0KM5IpixiFBuiYAtU7LZVzai', 'user_type_id' => 2],
            ['id' => 65, 'name' => 'Orang Tua', 'email' => 'Orangtua@gmail.com', 'password' => '$2y$10$CmofPg/qXWbApN87LJTfSeE074orUsOeQl.2Soft59EeQoNQfsW6e', 'user_type_id' => 4],
            ['id' => 66, 'name' => 'Orang Tua 2', 'email' => 'Orangtua2@gmail.com', 'password' => '$2y$10$BOyGp5T4EQ5kXEKze4gKIuikQpExmN2PyM.4SuWRNMCEvJ7C8ECmO', 'user_type_id' => 4],
            ['id' => 67, 'name' => 'Orang Tua 3', 'email' => 'Orangtua3@gmail.com', 'password' => '$2y$10$W7neVz2sREWMsEVVIG51j.DFKh1mwKnp3JcO2snCzQZvSGV12MEsO', 'user_type_id' => 4],
            ['id' => 68, 'name' => 'Orang Tua 4', 'email' => 'Orangtua4@gmail.com', 'password' => '$2y$10$g3WlbsOOlHKBT.inSgFabuJ4qKMSWGIfAEendGQBspEEta1dtD7.e', 'user_type_id' => 4],
            ['id' => 69, 'name' => 'Orang Tua 5', 'email' => 'Orangtua5@gmail.com', 'password' => '$2y$10$ougf0DMfvW8h7YPcHDXgae74Sf1OiectvMA.EGJtz8A.BQqNA4n4y', 'user_type_id' => 4],
            ['id' => 70, 'name' => 'Orang Tua 6', 'email' => 'Orangtua6@gmail.com', 'password' => '$2y$10$hPErq5x2X.lrFxKkIFlG.Oe8q82iatXeYMAuO/YT6ieGQA5LKkzB6', 'user_type_id' => 4],
        ]);
    }
}