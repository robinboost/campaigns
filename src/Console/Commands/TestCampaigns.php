<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;
use Robinboost\Campaigns\Jobs\CalculationsJob;
use Robinboost\Campaigns\Jobs\CalculationsMemJob;

class TestCampaigns extends Command
{
    protected $signature = 'app:inspire';

    protected $description = 'Display an inspiring quote';

    public function handle()
    {
        $a = 0;
        for($i = 0; $i >= 0; $i++) {
            $a += $i;
            CalculationsJob::dispatch($a);
            CalculationsMemJob::dispatch($a);
        }
    }
}
