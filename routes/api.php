<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PokemonTcgMarketplaceController;
use App\Http\Middleware\ValidateApiKey;

Route::middleware('auth:sanctum',ValidateApiKey::class)->group(function (Request $request) {

    Route::apiResource('pokemon_tcg_marketplace', PokemonTcgMarketplaceController::class);
});
