<?php

namespace App\Models;

use App\Models\Asesor;
use App\Models\Integrante;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'hashname',
    ];

    public function integrantes(){
        return $this->hasMany(Integrante::class);
    }

    public function asesores(){
        return $this->hasMany(Asesor::class);
    }

}
