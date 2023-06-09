<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        $this->call(CarreraSeeder::class);
        $this->call(EsquemaSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(TurnoSeeder::class);
    }
}
