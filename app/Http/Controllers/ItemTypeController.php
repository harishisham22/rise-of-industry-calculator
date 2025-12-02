<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index()
    {
        return ItemType::all();
    }

    public function store(Request $request)
    {
        return ItemType::create($request->validated());
    }

    public function show(ItemType $itemType)
    {
        return $itemType;
    }

    public function update(Request $request, ItemType $itemType)
    {
        $itemType->update($request->validated());

        return $itemType;
    }

    public function destroy(ItemType $itemType)
    {
        $itemType->delete();

        return 200;
    }
}
