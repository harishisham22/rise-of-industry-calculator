<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
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

    public function produceItems()
    {
        return $this->belongsToMany(Item::class, BuildingProduceItem::class);
    }

    public function requireItems()
    {
        return $this->belongsToMany(Item::class, BuildingRequireItem::class);
    }

    public function storeItems()
    {
        return $this->belongsToMany(Item::class, BuildingStoreItem::class);
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
            'produceItems',
            'requireItems',
            'storeItems',
            'type',
        ]);
    }
}
