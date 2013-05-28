<?php namespace EscapeWork\Msg\Laravel;

use Illuminate\Support\ServiceProvider;
use EscapeWork\Msg\Msg;

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
        Msg::setSessionHandler($this->app['session']);
    }
}