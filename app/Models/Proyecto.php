<?php

namespace App\Models;

use App\Models\Asesor;
use App\Models\Entrega;
use App\Models\Integrante;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{
    use HasFactory;

    protected $casts = [ 
        'fecha_entrega' => 'datetime',
        'fecha_entrega_2' => 'datetime',
        'fecha_entrega_3' => 'datetime',
    ];

    protected $fillable = [
        'titulo',
        'fecha_entrega',
        'fecha_entrega_2',
        'fecha_entrega_3',
        'hashname',
        'estatus',
    ];

    public function entregas(){
        return $this->hasMany(Entrega::class);
    }

    public function integrantes(){
        return $this->hasMany(Integrante::class);
    }

    public function asesores(){
        return $this->hasMany(Asesor::class);
    }

    public function sinodales(){
        return $this->hasMany(Sinodal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
