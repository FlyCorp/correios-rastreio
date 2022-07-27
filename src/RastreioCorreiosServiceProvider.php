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
      
        $this->package('flycorp/rastreio-correios', null, __DIR__ . '/../resources');
        
    }
}
