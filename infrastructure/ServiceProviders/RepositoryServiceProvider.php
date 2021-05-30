<?php
declare(strict_types=1);

namespace Infrastructure\ServiceProviders;

use Domain\Repositories\RateRepositoryInterface;
use Domain\Repositories\TechnologyRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Persistence\Repositories\RateRepository;
use Infrastructure\Persistence\Repositories\TechnologyRepository;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(RateRepositoryInterface::class, RateRepository::class);
        $this->app->bind(TechnologyRepositoryInterface::class, TechnologyRepository::class);
    }
}
