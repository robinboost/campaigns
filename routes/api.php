<?php

use Illuminate\Support\Facades\Route;
use Robinboost\Campaigns\Http\Controllers\CampaignController;

Route::post('/api/v1/reels/comments', [CampaignController::class, 'campaign']);
Route::post('/api/v1/reels/comments/tag', [CampaignController::class, 'tag']);
