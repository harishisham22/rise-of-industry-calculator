<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'type' => BuildingType::class,
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

    public function produceItems()
    {
        return $this->hasMany(BuildingProduceItem::class);
    }

    public function requireItems()
    {
        return $this->hasMany(BuildingRequireItem::class);
    }

    public function storeItems()
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
