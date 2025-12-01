<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRequireMaterial extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'material_id',
        'amount',
    ];

    protected $casts = [
        'item_id' => 'integer',
        'amount' => 'integer',
    ];

    protected $guarded = [
        'id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function material()
    {
        return $this->belongsTo(Item::class, 'material_id');
    }
}
