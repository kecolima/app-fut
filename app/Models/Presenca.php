<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $casts = [
        'jogadores' => 'array'
    ];

    use HasFactory;
    protected $fillable = ['data','tamanhoTime','jogadores'];
}
