<?php

namespace App\Providers;


use App\Http\Entities\User\User;
use App\Http\Entities\User\UserORMInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserORMInterface::class, User::class);
    }
}