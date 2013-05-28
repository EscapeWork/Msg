<?php namespace EscapeWork\Msg\Laravel;

use Illuminate\Support\ServiceProvider;

class MsgServiceProvider extends ServiceProvider 
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['escapework.msg'] = $this->app->share(function($app)
        {
            Msg::setDriver($app['session']);

            return new Msg;
        });
    }
}