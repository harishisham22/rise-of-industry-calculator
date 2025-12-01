<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return $items;
    }

    public function fetch(Item $item)
    {
        return $item;
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return $item;
    }
}
