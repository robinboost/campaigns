<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;

class TestCampaigns extends Command
{
    protected $signature = 'app:inspire';

    protected $description = 'Display an inspiring quote';

    public function handle()
    {
        for($i = 0; $i >= 0; $i++) {
            $a += $i;
        }
    }
}
