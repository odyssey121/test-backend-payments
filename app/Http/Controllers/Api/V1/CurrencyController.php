<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CurrencyCollection;
use App\Http\Resources\V1\CurrencyResource;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CurrencyCollection
     */
    public function index()
    {
        return new CurrencyCollection(Currency::all());
    }

    /**
     * Display the specified resource.
     *
     * @param Currency $currency
     * @return CurrencyResource
     */
    public function show(Currency $currency)
    {
        return new CurrencyResource($currency);
    }

}
