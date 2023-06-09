<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table('carreras')->insert([
            'descripcion' => 'INGENIERÍA EN COMPUTACIÓN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
