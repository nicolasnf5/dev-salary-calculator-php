<?php
declare(strict_types=1);

namespace Application\Commands\Rate;

use Domain\Enums\LanguageEnum;
use Domain\Enums\SeniorityEnum;
use Domain\Enums\SupportedCurrencyEnum;
use Exception;
use InvalidArgumentException;
use Money\Number;

final class CreateRateCommand
{
    public function __construct(
        private int $technologyId,
        private string $seniority,
        private string $language,
        private string $averageSalaryInCents,
        private string $grossMarginInCents,
        private string $currency,
    ) {
        if (! SeniorityEnum::isValid($seniority)) {
            throw new InvalidArgumentException('Invalid seniority');
        }

        if (! LanguageEnum::isValid($language)) {
            throw new InvalidArgumentException('Invalid language');
        }

        try {
            Number::fromString($averageSalaryInCents);
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                'Invalid average salary: "' . $e->getMessage() . '"'
            );
        }

        try {
            Number::fromString($grossMarginInCents);
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                'Invalid gross margin: "' . $e->getMessage() . '"'
            );
        }

        if (! Number::fromString($averageSalaryInCents)->isInteger()) {
            throw new InvalidArgumentException(
                'Invalid average salary: "Number is not an integer"'
            );
        }

        if (! Number::fromString($grossMarginInCents)->isInteger()) {
            throw new InvalidArgumentException(
                'Invalid gross margin: "Number is not an integer"'
            );
        }

        if (! SupportedCurrencyEnum::isValid($currency)) {
            throw new InvalidArgumentException('Not supported currency');
        }
    }

    public function getTechnologyId(): int
    {
        return $this->technologyId;
    }

    public function getSeniority(): string
    {
        return $this->seniority;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getAverageSalaryInCents(): string
    {
        return $this->averageSalaryInCents;
    }

    public function getGrossMarginInCents(): string
    {
        return $this->grossMarginInCents;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
