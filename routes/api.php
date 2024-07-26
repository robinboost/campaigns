<?php

use Illuminate\Support\Facades\Route;
use Robust\Campaigns\Http\Controllers\CampaignController;

Route::post('/api/v1/reels/comments', [CampaignController::class, 'campaign']);
