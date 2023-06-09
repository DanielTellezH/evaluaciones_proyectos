<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EsquemaSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table('esquemas')->insert([
            'descripcion' => 'PROFESOR DE PROYECTO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('esquemas')->insert([
            'descripcion' => 'ASESOR DE PROYECTO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('esquemas')->insert([
            'descripcion' => 'SINONAL DE PROYECTO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('esquemas')->insert([
            'descripcion' => 'ALUMNO',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
