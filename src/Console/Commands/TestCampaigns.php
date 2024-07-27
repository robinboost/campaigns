<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Robinboost\Campaigns\Jobs\CalculationsJob;
use Robinboost\Campaigns\Jobs\CalculationsMemJob;

class TestCampaigns extends Command
{
    protected $signature = 'app:inspire';

    protected $description = 'Display an inspiring quote';

    public function handle()
    {
        $a = 0;
        for($i = 0; $i >= 0 && $i < 10; $i++) {
            $a += $i;
            $this->info('Iteration: ' . $i);
            if ($i % 2 == 0) {
                CalculationsJob::dispatch($a);
                $this->info('Dispatched CalculationsJob');
            } else {
                CalculationsMemJob::dispatch($a);
                $this->info('Dispatched CalculationsMemJob');
            }
        }
    }
}
