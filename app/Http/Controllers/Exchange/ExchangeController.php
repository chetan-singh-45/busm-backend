<?php

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Models\Stock;
use Illuminate\Support\Facades\Http;


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
    
    public function exchangeStocks($id,Request $request)
    {
        $exchange = Exchange::where('id', $id)->update(['is_selected' => 1]);
        
        if($exchange){
            $stocks = Stock::where('exchange_id',$id)->get();
            return response()->json([
                'message' => 'Stock fetched successfully',
                'stocks' =>$stocks,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Please select exchange',
            ]); 
        }
    }

    // stock belong with exchange
    public function stockwithExchage(Request $request)
    {
        $symbol = $request->symbol;
        $baseURL = "https://api.marketstack.com/v2/tickers/{$symbol}";
        $response = Http::get($baseURL,[
                        'access_key'=>env('ACCESS_KEY'),
                    ]);
        return response()->json(
            [
                'stocks' =>$$response,
            ]
        );
        
    }

    //Exchange with their tickers[Company name and symbols]
    public function exchageWithTickers(Request $request)
    {
        $exchange = $request->exchange;
        $baseURL = "https://api.marketstack.com/v2/exchanges/{$exchange}/tickers";
        $response = Http::get($baseURL,[
                        'access_key'=>env('ACCESS_KEY'),
                    ]);
                    return response()->json(
                        [
                            'exchangeStocks' =>$$response,
                        ]
                    );
        
    }

//////working
    // public function getEOD(Request $request)
    // {
    //     $symbol = $request->symbol;
    //     $url = "http://api.marketstack.com/v2/eod/";

    //     $response = Http::get($url, [
    //         'access_key' => env('ACCESS_KEY'),
    //         'symbol'    => $symbol,
    //     ]);

    //     return $response->json();
    // }


}
