<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    protected $table = "asesores";

    public function proyectos(){
        return $this->hasMany(Proyecto::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
