<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();

        return BuildingResource::collection($buildings);
    }

    public function fetch(string $buildingId)
    {
        $building = Building::withAllRelations()->findOrFail($buildingId);

        return BuildingResource::make($building);
    }

    public function store(StoreBuildingRequest $request)
    {
        $building = Building::create($request->validated());

        return BuildingResource::make($building);
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        $building->update($request->validated());

        return BuildingResource::make($building);
    }

    public function destroy(Building $building)
    {
        $building->delete();

        return response()->json([
            'message' => 'Building deleted successfully',
        ], 200);
    }
}
