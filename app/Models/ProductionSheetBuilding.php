<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionSheetBuilding extends Model
{
    protected $timestamps = false;

    protected $fillable = [
        'production_sheet_id',
        'building_id',
        'quantity',
    ];

    protected $guarded = ['id'];
    
    protected $casts = [
        'production_sheet_id' => 'integer',
        'building_id' => 'integer',
        'quantity' => 'integer',
    ];

    public function productionSheet()
    {
        return $this->belongsTo(ProductionSheet::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
