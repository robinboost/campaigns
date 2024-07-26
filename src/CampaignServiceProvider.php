<?php
namespace Robinboost\Campaigns;

use Illuminate\Support\ServiceProvider;

class CampaignsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/campaigns.php' => config_path('campaigns.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(__DIR__.'/../config/campaigns.php', 'campaigns');
    }
}
