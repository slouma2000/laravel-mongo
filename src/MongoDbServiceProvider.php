<?php

namespace Lindelius\LaravelMongo;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\ServiceProvider;

/**
 * Class MongoDbServiceProvider
 *
 * @author  Tom Lindelius <tom.lindelius@gmail.com>
 * @package Lindelius\LaravelMongo
 * @version 0.1
 */
class MongoDbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->resolving('db', function ($databaseManager) {
            /**
             * @var DatabaseManager $databaseManager
             */
            $databaseManager->extend('mongodb', function ($config) {
                return new MongoDbConnection($config);
            });
        });
    }
}
