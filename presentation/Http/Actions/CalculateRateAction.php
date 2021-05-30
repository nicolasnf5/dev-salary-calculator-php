<?php
declare(strict_types=1);

namespace Presentation\Http\Actions;

use Domain\Entities\Rate;
use Domain\Enums\LanguageEnum;
use Domain\Enums\SeniorityEnum;
use Domain\Enums\SupportedCurrencyEnum;
use Domain\Repositories\RateRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InvalidArgumentException;

final class CalculateRateAction
{
    public function __construct(
        private RateRepositoryInterface $rateRepository,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $technologyIds = $request->technology_ids;
        $seniority = $request->seniority;
        $language = $request->language;
        $currency = $request->currency;

        if ($seniority && ! SeniorityEnum::isValid($seniority)) {
            throw new InvalidArgumentException('Invalid seniority');
        }

        if ($language && ! LanguageEnum::isValid($language)) {
            throw new InvalidArgumentException('Invalid language');
        }

        if ($currency && ! SupportedCurrencyEnum::isValid($currency)) {
            throw new InvalidArgumentException('Not supported currency');
        }

        $technologyIds = array_map(function ($technologyId) {
            return intval($technologyId);
        }, $technologyIds);

        $rates = $this->rateRepository->findAllBy(
            $technologyIds,
            $seniority,
            $language,
            $currency,
        );

        $rates = array_map(function (Rate $rate) {
            return [
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
