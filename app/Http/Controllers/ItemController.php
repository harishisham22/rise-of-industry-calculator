<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return ItemResource::collection($items);
    }

    public function fetch(string $itemId)
    {
        $item = Item::withAllRelations()->findOrFail($itemId);

        return ItemResource::make($item);
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return ItemResource::make($item);
    }

    public function update(Request $request, string $itemId)
    {
        $item = Item::withAllRelations()->findOrFail($itemId);

        $item->update($request->all());

        return ItemResource::make($item);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }
}
