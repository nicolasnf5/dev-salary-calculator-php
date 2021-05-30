<?php
declare(strict_types=1);

namespace Presentation\Http\Actions;

use Domain\Entities\Rate;
use Domain\Repositories\RateRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ListRatesAction
{
    public function __construct(
        private RateRepositoryInterface $rateRepository,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $rates = $this->rateRepository->findAll();

        $rates = array_map(function (Rate $rate) {
            return [
                'id'              => $rate->getId(),
                'technology_id'   => $rate->getTechnology()->getId(),
                'technology_name' => $rate->getTechnology()->getName(),
                'seniority'       => $rate->getSeniority(),
                'language'        => $rate->getLanguage(),
                'average_salary_in_cents' => (int) $rate->getAverageSalary()->getAmount(),
                'gross_margin_in_cents'   => (int) $rate->getGrossMargin()->getAmount(),
                'currency'                => (string) $rate->getGrossMargin()->getCurrency(),
                'gross_margin_percentage' => $rate->getGrossMarginPercentage(),
                'total_in_cents'          => (int) $rate->getTotal()->getAmount(),
            ];
        }, $rates);

        return \Illuminate\Support\Facades\Response::json($rates);
    }
}
