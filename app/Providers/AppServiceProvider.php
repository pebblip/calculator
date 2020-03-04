<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use pebblip\domain\Environment;
use pebblip\domain\EnvironmentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EnvironmentRepository::class,
                function ($app) {
                    return new class implements EnvironmentRepository {
                        public function get(): Environment
                        {

                            if (!Session::has('environment')) {
                                //throw new \Exception('aaaa');
                                Session::put('environment', new Environment());
                                Session::save();
                            }


                            return Session::get('environment');
                        }
                    };
                }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
