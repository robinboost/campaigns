<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Robinboost\Campaigns\Jobs\CalculationsJob;
use Robinboost\Campaigns\Jobs\CalculationsMemJob;

class TestCampaigns extends Command
{
    protected $signature = 'app:inspire {count=10}';

    protected $description = 'Display an inspiring quote';

    public function handle()
    {
        $a = 0;
        $i = 0;
        $count = $this->argument('count');

        $condition = false;
        if($count == -1) {
            $condition = true;
        }

        $this->info('Inf: ' . ($condition ? 'true' : 'false'));

        if ($condition) {
            while (true) {
                $a += $i;
                $this->doThis($a, $i);
                $i++;
            }
        } else {
            for ($i = 0; $i < (int)$count; $i++) {
                $a += $i;
                $this->info('Iteration: ' . $i);
                $this->doThis($a, $i);
            }
        }
    }

    public function doThis($a, $i)
    {
        if ($i % 2 == 0) {
            CalculationsJob::dispatch($a);
        } else {
            CalculationsMemJob::dispatch($a);
        }
    }
}
