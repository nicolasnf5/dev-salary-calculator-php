<?php
declare(strict_types=1);

namespace Application\Commands\Rate;

use Exception;
use InvalidArgumentException;
use Money\Number;

final class EditRateCommand
{
    public function __construct(
        private int $id,
        private string $averageSalaryInCents,
        private string $grossMarginInCents,
    ) {
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
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAverageSalaryInCents(): string
    {
        return $this->averageSalaryInCents;
    }

    public function getGrossMarginInCents(): string
    {
        return $this->grossMarginInCents;
    }
}
