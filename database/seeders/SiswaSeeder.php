<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('siswa')->$insert([
            'nama' => "dimas",
            'kelas' => 12,
            'jurusan' => "Teknik Jaringan Komputer",
        ]);
    }
}
