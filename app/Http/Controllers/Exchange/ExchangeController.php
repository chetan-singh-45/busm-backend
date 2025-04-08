<?php

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exchange;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::where('is_selected', '1')->get();
        $allExchanges = Exchange::all();
        return response()->json([
            'selectedExchanges' => $exchanges,
            'allExchanges' => $allExchanges,
        ]);
    }

    public function selectExchange(Request $request)
    {
        Exchange::where('id', $request->exchange_id)->update(['is_selected' => 1]);

        return response()->json([
            'message' => 'Exchange selected successfully',
        ]);
    }
}
