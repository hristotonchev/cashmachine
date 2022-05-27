<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @TransactionServiceProvider
 * @package App\Providers
 */
class TransactionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('App\CustomClass\Transaction', 'App\CustomClass\CashTransaction');
        $this->app->bind('App\CustomClass\Transaction', 'App\CustomClass\BankTransaction');
        $this->app->bind('App\CustomClass\Transaction', 'App\CustomClass\CardTransaction');
    }
}
