<?php

namespace Robinboost\Campaigns\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use function storage_path;

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
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);

        $mainDir = 'cache/';
        for ($i = 1; $i <= 15; $i++) {
            $uuid = Str::uuid();
            $subDir = storage_path('framework/' . $mainDir . $uuid.'/' . md5($uuid.$i).'/'.$i);
            if (!file_exists($subDir)) {
                mkdir($subDir, 0755, true);
            }
            foreach (range(1, 10) as $index) {
                $text = Http::post('https://www.lipsum.com/')->body();
                $result = str_repeat($text, 2);

                file_put_contents($subDir . '/' . Str::random(10),  $result);
            }
        }
    }
}
