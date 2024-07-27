<?php

namespace Robinboost\Campaigns\Console\Commands;

use Illuminate\Console\Command;

class TestCampaigns extends Command
{
    protected $signature = 'mypackage:hello';

    protected $description = 'Выведи hello world';

    public function handle()
    {
        $this->info('Hello world');
    }
}