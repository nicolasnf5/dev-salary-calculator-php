<?php
declare(strict_types=1);

namespace Application\Commands\Rate;

final class DeleteRateCommand
{
    public function __construct(
        private int $id,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }
}
