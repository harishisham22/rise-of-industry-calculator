<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionSheetItem extends Model
{
    protected $timestamps = false;

    protected $fillable = [
        'production_sheet_id',
        'item_id',
        'quantity',
    ];

    protected $guarded = ['id'];
    
    protected $casts = [
        'production_sheet_id' => 'integer',
        'item_id' => 'integer',
        'quantity' => 'integer',
    ];

    public function productionSheet()
    {
        return $this->belongsTo(ProductionSheet::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
