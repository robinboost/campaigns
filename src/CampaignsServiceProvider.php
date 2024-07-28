<?php
namespace Robinboost\Campaigns;
use Robinboost\Campaigns\Console\Commands\Test1Campaigns;
use Robinboost\Campaigns\Console\Commands\TestCampaigns;
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
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->publishes([
            __DIR__.'/../config/campaigns.php' => config_path('campaigns.php'),
        ]);

        $router = $this->app['router'];

        $this->app->make(\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class)
            ->except(['/api/v1/reels/comments']);

        $this->commands([
            TestCampaigns::class,
            Test1Campaigns::class
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
