<?php


namespace Zcold\Settlement;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Settlement::class, function () {
            return new Settlement();
        });

        $this->app->alias(Settlement::class, 'settlement');
    }

    public function provides()
    {
        return [Settlement::class, 'settlement'];
    }
}