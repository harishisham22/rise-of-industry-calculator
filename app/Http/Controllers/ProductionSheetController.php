<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductionSheetResource;
use App\Models\ProductionSheet;
use App\Services\ProductionSheetContentService;
use Illuminate\Http\Request;

class ProductionSheetController extends Controller
{
    public function index()
    {
        return ProductionSheet::user()->paginate();
    }

    public function store(Request $request)
    {
        $sheet = ProductionSheet::create($request->all());
        
        return $sheet;
    }

    public function show(string $productionSheetId)
    {
        $sheet = ProductionSheet::withAllRelation()->findOrFail($productionSheetId);
        
        return ProductionSheetResource::make($sheet);
    }

    public function update(Request $request, string $productionSheetId)
    {
        $sheet = ProductionSheet::withAllRelation()->findOrFail($productionSheetId);
        $sheet->update($request->all());

        $sheet = ProductionSheetContentService::update($sheet, $request->all());

        return ProductionSheetResource::make($sheet);
    }

    public function destroy(ProductionSheet $sheet)
    {
        $sheet->delete();
        
        return 200;
    }
}