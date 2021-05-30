<?php
declare(strict_types=1);

namespace Domain\Entities;

use Domain\Enums\LanguageEnum;
use Domain\Enums\SeniorityEnum;
use Domain\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;
use Money\Currency;
use Money\Money;

class Rate extends Model
{
    use IdentityTrait;

    public function getTechnology(): Technology
    {
        return $this->technology;
    }

    public function setTechnology(Technology $technology): void
    {
        $this->technology()->associate($technology);
    }

    public function getSeniority(): string
    {
        return $this->seniority;
    }

    public function setSeniority(string $seniority): void
    {
        if (! SeniorityEnum::isValid($seniority)) {
            throw new InvalidArgumentException();
        }

        $this->seniority = $seniority;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        if (! LanguageEnum::isValid($language)) {
            throw new InvalidArgumentException();
        }

        $this->language = $language;
    }

    public function getAverageSalary(): Money
    {
        return new Money($this->average_salary, new Currency($this->currency));
    }

    public function setAverageSalary(Money $averageSalary): void
    {
        $this->average_salary = $averageSalary->getAmount();
        $this->currency = (string) $averageSalary->getCurrency();
    }

    public function getGrossMargin(): Money
    {
        return new Money($this->gross_margin, new Currency($this->currency));
    }

    public function setGrossMargin(Money $grossMargin): void
    {
        $this->gross_margin = $grossMargin->getAmount();
        $this->currency = (string) $grossMargin->getCurrency();
    }

    public function getGrossMarginPercentage(): float
    {
        return round(
            (
                (int) $this->getGrossMargin()->getAmount() /
                (int) $this->getTotal()->getAmount()
            ),
            2
        );
    }

    public function getTotal(): Money
    {
        return $this->getAverageSalary()->add($this->getGrossMargin());
    }

    public static function create(
        Technology $technology,
        string $seniority,
        string $language,
        string $averageSalaryInCents,
        string $grossMarginInCents,
        string $currency
    ): self {
        $rate = new self();
        $rate->setTechnology($technology);
        $rate->setSeniority($seniority);
        $rate->setLanguage($language);
        $rate->setAverageSalary(
            new Money($averageSalaryInCents, new Currency($currency))
        );
        $rate->setGrossMargin(
            new Money($grossMarginInCents, new Currency($currency))
        );

        return $rate;
    }

    public function edit(
        string $averageSalaryInCents,
        string $grossMarginInCents,
    ): self {
        $this->setAverageSalary(
            new Money($averageSalaryInCents, $this->getAverageSalary()->getCurrency())
        );
        $this->setGrossMargin(
            new Money($grossMarginInCents, $this->getGrossMargin()->getCurrency())
        );

        return $this;
    }

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class, 'technology_id');
    }
}
