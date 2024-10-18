<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;


//    protected $table = 'currencies';
//    protected $primaryKey = 'id';
//    protected $connection = 'second';
    public $incrementing = false;
    protected $fillable = [
        'id', /* because id not increment */
        'name',
        'price',

        'active',
        'sort',
    ];

    protected $hidden = [
//        'price',
    ];

    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
        'sort' => 'integer',
        'active_at' => 'datetime',
    ];
}
