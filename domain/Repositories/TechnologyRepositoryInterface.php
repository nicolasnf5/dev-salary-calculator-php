<?php
declare(strict_types=1);

namespace Domain\Repositories;

use Domain\Entities\Technology;

interface TechnologyRepositoryInterface
{
    public function findOneById(int $id): ?Technology;

    public function findOneByName(string $name): ?Technology;

    public function findAll(): array;

    public function save(Technology $technology): void;

    public function delete(Technology $technology): void;
}
