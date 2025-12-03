<?php

namespace App\Models;

use App\ItemType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type_id',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'type_id' => 'integer',
        'description' => 'string',
    ];

    protected $guarded = [
        'id',
    ];

    public function requireMaterials()
    {
        return $this->belongsToMany(Item::class, ItemRequireMaterial::class);
    }

    public function producedBy()
    {
        return $this->belongsToMany(Building::class, BuildingProduceItem::class);
    }

    public function requiredBy()
    {
        return $this->belongsToMany(Building::class, BuildingRequireItem::class);
    }

    public function storedBy()
    {
        return $this->belongsToMany(Building::class, BuildingStoreItem::class);
    }

    public function scopeType(Builder $query, ?string $type)
    {
        return $query->when($type, fn($query) => $query->whereRelation('type', 'name', $type));
    }

    public function scopeSearch(Builder $query, ?string $search)
    {
        return $query->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"));
    }

    public function scopeWithAllRelations(Builder $query)
    {
        return $query->with([
            'requireMaterials',
            'producedBy',
            'requiredBy',
            'storedBy',
            'type',
        ]);
    }
}
