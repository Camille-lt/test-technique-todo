<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //j'indique les colonnes qui doivent être remplies
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

}
