<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'stock',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        [
            'name' => 'string',
        'description' => 'string',
         'price' => 'decimal:2',
        'stock' => 'integer',
        ]
    ];
}
