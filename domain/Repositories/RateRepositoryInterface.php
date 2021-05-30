<?php
declare(strict_types=1);

namespace Domain\Repositories;

use Domain\Entities\Rate;

interface RateRepositoryInterface
{
    public function findOneById(int $id): ?Rate;

    public function findAll(): array;

    public function findAllBy(
        array $technologyIds,
        string $seniority = null,
        string $language = null,
        string $currency = null,
    ): array;

    public function exists(
        int $technologyId,
        string $seniority,
        string $language,
        string $currency,
    ): bool;

    public function save(Rate $rate): void;

    public function delete(Rate $rate): void;
}
