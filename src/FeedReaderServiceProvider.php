<?php

namespace EduardoStuart\FeedReader;

use Illuminate\Support\ServiceProvider;

class FeedReaderServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('feed-reader',function($app)
        {
            return (new FeedReader($app['config']['feedreader']))->build();
        });

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('feedreader.php'),
        ],'config');
    }

    public function provides()
    {
        return ['feed-reader'];
    }

}