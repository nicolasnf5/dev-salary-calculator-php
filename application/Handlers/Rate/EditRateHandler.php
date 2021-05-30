<?php
declare(strict_types=1);

namespace Application\Handlers\Rate;

use Application\Commands\Rate\EditRateCommand;
use Domain\Exceptions\RateNotFoundException;
use Domain\Repositories\RateRepositoryInterface;

final class EditRateHandler
{
    public function __construct(
        private RateRepositoryInterface $rateRepository,
    ) {}

    public function handle(EditRateCommand $command): void
    {
        $rate = $this->rateRepository->findOneById(
            $command->getId()
        );

        if (! $rate) {
            throw new RateNotFoundException();
        }

        $rate->edit(
            $command->getAverageSalaryInCents(),
            $command->getGrossMarginInCents(),
        );

        $this->rateRepository->save($rate);
    }
}
