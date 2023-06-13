<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model{
    use HasFactory;

    protected $fillable = [
        'presentacion',
        'tesina',
        'comentarios',
        'user_id',
        'atrasado',
        'calificacion',
        'num_entrega',
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class)->select(['id', 'name']);
    }

    public function observaciones(){
        return $this->hasMany(Observacion::class);
    }
    
}
