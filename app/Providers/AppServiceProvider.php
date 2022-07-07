<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ClientRepositoryInterface;
use App\Repositories\ClientRepository;

use App\Interfaces\StatusRepositoryInterface;
use App\Repositories\StatusRepository;

use App\Interfaces\HomecareRepositoryInterface;
use App\Repositories\HomecareworkerRepository;

use App\Interfaces\CoordinatorRepositoryInterface;
use App\Repositories\CoordinatorRepository;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

use App\Interfaces\NurseRepositoryInterface;
use App\Repositories\NurseRepository;

use App\Interfaces\IncidentRepositoryInterface;
use App\Repositories\IncidentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(HomecareRepositoryInterface::class, HomecareworkerRepository::class);
        $this->app->bind(CoordinatorRepositoryInterface::class, CoordinatorRepository::class );
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class );
        $this->app->bind(NurseRepositoryInterface::class, NurseRepository::class );

         $this->app->bind(IncidentRepositoryInterface::class, IncidentRepository::class );
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
