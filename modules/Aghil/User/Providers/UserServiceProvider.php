<?php
/**
 * Created and Developed by Aghil Padash
 **/

namespace Aghil\User\Providers;


use Aghil\User\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Factories');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'User');

        Factory::guessFactoryNamesUsing(function ($modelName) {
            return 'Aghil\User\Database\Factories\\' . class_basename($modelName) . 'Factory';
        });
        config()->set('auth.providers.users.model', User::class);
    }

    public function boot()
    {

    }
}