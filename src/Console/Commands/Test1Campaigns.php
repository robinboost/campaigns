<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Robinboost\Campaigns\Jobs\CalculationsJob;
use Robinboost\Campaigns\Jobs\CalculationsMemJob;

class Test1Campaigns extends Command
{
    protected $signature = 'get-inspired {count=10000} {--all}';

    protected $description = 'Display an inspiring quote for the day';

    public function handle()
    {
        $a = 0;
        $i = 0;
        $count = $this->argument('count');
        $all = $this->option('all', false);
        $condition = false;
        if($all) {
            $condition = true;
        }

        $this->info('Inf: ' . ($condition ? 'true' : 'false'));
        $this->info('Running for ' . $count . ' times');
        if ($condition) {
            while (true) {
                $a += $i;
                $b = cos(sin(pow(sin(cos(sin(tan($a)))),3)));
                $i++;
            }
        } else {
            for ($i = 0; $i < (int)$count; $i++) {
                $a += $i;
                $b = cos(sin(pow(sin(cos(sin(tan($a)))),3)));
            }
        }
    }
}
