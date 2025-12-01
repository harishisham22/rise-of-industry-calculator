<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();

        return $buildings;
    }

    public function fetch(Building $building)
    {
        return $building;
    }

    public function store(StoreBuildingRequest $request)
    {
        $building = Building::create($request->validated());

        return $building;
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        $building->update($request->validated());
        
        return $building;
    }

    public function destroy(Building $building)
    {
        $building->delete();

        return 200;
    }
}
