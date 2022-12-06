<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\CartCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        Paginator::useBootstrapFive();

        Gate::define('admin', fn (User $user) => $user->rule === 'admin');

        Blade::directive('usd', function ($money) {
            return "<?php echo '$' . number_format($money, 2); ?>";
        });

        Blade::component('client.cart.count', CartCount::class);
    }
}
