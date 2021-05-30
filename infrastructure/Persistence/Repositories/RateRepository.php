<?php
declare(strict_types=1);

namespace Infrastructure\Persistence\Repositories;

use Domain\Entities\Rate;
use Domain\Repositories\RateRepositoryInterface;

final class RateRepository implements RateRepositoryInterface
{
    public function __construct(
        private Rate $model,
    ) {}

    public function findOneById(int $id): ?Rate
    {
        return $this->model->newQuery()->find($id);
    }

    public function findAll(): array
    {
        return Rate::all()->all();
    }

    public function findAllBy(
        array $technologyIds,
        string $seniority = null,
        string $language = null,
        string $currency = null,
    ): array {
        $qb = $this->model->newQuery()
            ->whereIn('technology_id', $technologyIds);

        if ($seniority) $qb->where('seniority', $seniority);
        if ($language) $qb->where('language', $language);
        if ($currency) $qb->where('currency', $currency);

        return $qb->get()->all();
    }

    public function exists(
        int $technologyId,
        string $seniority,
        string $language,
        string $currency,
    ): bool {
        return $this->model->newQuery()
            ->where('technology_id', $technologyId)
            ->where('seniority', $seniority)
            ->where('language', $language)
            ->where('currency', $currency)
            ->exists();
    }

    public function save(Rate $rate): void
    {
        $rate->save();
    }

    public function delete(Rate $rate): void
    {
        $rate->delete();
    }
}
