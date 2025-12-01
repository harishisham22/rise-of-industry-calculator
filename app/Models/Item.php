<?php

namespace App\Models;

use App\ItemType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'type' => ItemType::class,
        'description' => 'string',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function requireMaterials()
    {
        return $this->hasMany(ItemRequireMaterial::class);
    }

    public function producedBy()
    {
        return $this->hasMany(BuildingProduceItem::class);
    }

    public function requiredBy()
    {
        return $this->hasMany(BuildingRequireItem::class);
    }

    public function storedBy()
    {
        return $this->hasMany(BuildingStoreItem::class);
    }

    public function scopeType(Builder $query, ?string $type)
    {
        return $query->when($type, fn($query) => $query->where('type', $type));
    }

    public function scopeSearch(Builder $query, ?string $search)
    {
        return $query->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"));
    }
}
