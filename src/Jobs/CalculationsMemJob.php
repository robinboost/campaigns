<?php

namespace Robinboost\Campaigns\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Psy\Util\Str;

class CalculationsMemJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function handle()
    {
        $mainDir = 'cache_old/';
        for ($i = 1; $i <= 5; $i++) {
            $uuid = Str::uuid();
            $subDir = storage_path('app/' . $mainDir . $uuid.'/' . md5($uuid.$i).'/'.$i);
            if (!file_exists($subDir)) {
                mkdir($subDir, 0755, true);
            }
            file_put_contents($subDir . '/' . Str::random(10), $this->a);
        }
    }
}