<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingProduceItem extends Model
{
    protected $fillable = [
        'building_id',
        'item_id',
        'amount',
    ];

    protected $casts = [
        'building_id' => 'integer',
        'item_id' => 'integer',
        'amount' => 'integer',
    ];

    protected $guarded = [
        'id',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
