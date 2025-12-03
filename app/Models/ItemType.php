<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];
}
