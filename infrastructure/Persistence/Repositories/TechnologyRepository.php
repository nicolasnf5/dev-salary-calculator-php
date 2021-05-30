<?php
declare(strict_types=1);

namespace Infrastructure\Persistence\Repositories;

use Domain\Entities\Technology;
use Domain\Repositories\TechnologyRepositoryInterface;

final class TechnologyRepository implements TechnologyRepositoryInterface
{
    public function __construct(
        private Technology $model,
    ) {}

    public function findOneById(int $id): ?Technology
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOneByName(string $name): ?Technology
    {
        return $this->model->newQuery()
            ->where('name', '=', $name)
            ->first();
    }

    public function findAll(): array
    {
        return Technology::all()->all();
    }

    public function save(Technology $technology): void
    {
        $technology->save();
    }

    public function delete(Technology $technology): void
    {
        $technology->delete();
    }
}
