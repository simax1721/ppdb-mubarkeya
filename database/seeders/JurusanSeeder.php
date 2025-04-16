<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new Jurusan();
        $data->name = 'Teknik Jaringan Komputer dan Telekomunikasi';
        $data->total = 50;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Pengembangan Perangkat Lunak dan Gim';
        $data->total = 25;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Akuntansi dan Keuangan Lembaga';
        $data->total = 25;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Desain Pemodelan dan Informasi Bangunan';
        $data->total = 25;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Teknik Otomotif';
        $data->total = 50;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Kuliner';
        $data->total = 25;
        $data->save();
        
        $data = new Jurusan();
        $data->name = 'Busana';
        $data->total = 25;
        $data->save();

    }
}
