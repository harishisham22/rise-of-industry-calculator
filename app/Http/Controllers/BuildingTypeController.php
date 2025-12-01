<?php

namespace App\Http\Controllers;

use App\Models\BuildingType;
use Illuminate\Http\Request;

class BuildingTypeController extends Controller
{
    public function index()
    {
        return BuildingType::all();
    }

    public function store(StoreBuildingTypeRequest $request)
    {
        return BuildingType::create($request->validated());
    }

    public function show(BuildingType $buildingType)
    {
        return $buildingType;
    }

    public function update(UpdateBuildingTypeRequest $request, BuildingType $buildingType)
    {
        $buildingType->update($request->validated());
        return $buildingType;
    }

    public function destroy(BuildingType $buildingType)
    {
        $buildingType->delete();
        return response()->noContent();
    }
}
