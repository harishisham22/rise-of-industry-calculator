<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    protected $timestamps = false;

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
