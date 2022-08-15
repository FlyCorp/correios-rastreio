<?php
namespace FlyCorp\RastreioCorreios;

use Illuminate\Support\ServiceProvider;

class RastreioCorreiosServiceProvider extends ServiceProvider
{
    public function register() 
    {
    }

    public function boot()
    {
        if (method_exists($this, 'loadViewsFrom')) {
            // Laravel 5
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tracking');
        } else {
            // Laravel 4
            $this->package('flycorp/rastreio-correios', null, __DIR__ . '/../resources');
        }
       
    }
   
}
