<?php

namespace Billing;

use Billing\MercadoPago\Api\Client;
use Billing\MercadoPago\PaymentMethods\Factory;
use GuzzleHttp\Client as GuzzleHttp;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(Client::class, function ($app) {
            $http = new GuzzleHttp([
                'base_uri' => $app['config']['mercadopago']['base_url'],
                'verify' => false,
                'query' => [
                    'access_token' => $app['config']['mercadopago']['token']
                ],
            ]);

            $factory = new Factory();

            return new Client($http, $factory);
        });
    }

    public function provides()
    {
        return [Client::class];
    }
}