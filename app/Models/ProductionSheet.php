<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductionSheet extends Model
{
    protected $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    protected $guarded = ['id'];
    
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buildings()
    {
        return $this->hasMany(ProductionSheetBuilding::class);
    }

    public function items()
    {
        return $this->hasMany(ProductionSheetItem::class);
    }

    public function scopeUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function scopeWithAllRelation(Builder $query)
    {
        return $query->with([
            'buildings.building.produceItems',
            'buildings.building.requireItems',
            'buildings.building.storeItems',
            'items.item.requireMaterials',
            'items.item.producedBy',
            'items.item.requiredBy',
            'items.item.storedBy',
        ]);
    }
}
