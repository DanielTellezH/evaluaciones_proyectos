<?php

namespace App\Models;

use App\Models\Proyecto;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
