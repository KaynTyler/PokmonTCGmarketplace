<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PokemonTcgMarketplace;
use Illuminate\Http\Request;

class PokemonTcgMarketplaceController extends Controller
{

    public function index()
    {
        $marketplace = PokemonTcgMarketplace::all();
        return response()->json($marketplace);
    }

    //Create
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'image_url' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $marketplace = new PokemonTcgMarketplace( [
            'name' => $request->input('name'),
            'image_url' => $request->input('image_url'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'user_id' => auth()->user()->id,
        ]);

        $marketplace->save();
        return response()->json($marketplace);
    }

    //Read
    public function show(string $id)
    {
        $marketplace = PokemonTcgMarketplace::findOrFail($id);
        return response()->json($marketplace);
    }

   //Update
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $marketplace = PokemonTcgMarketplace::findOrFail($id);
        $marketplace->name = $request->input('name');
        $marketplace->image;
    }

   //Delete
    public function destroy(string $id)
    {
    $marketplace = PokemonTcgMarketplace::findOrFail($id);
    $marketplace->delete();

    return response()->json($marketplace::all());
    }
}
