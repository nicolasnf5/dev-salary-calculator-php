<?php
declare(strict_types=1);

namespace Application\Handlers\Rate;

use Application\Commands\Rate\DeleteRateCommand;
use Domain\Exceptions\RateNotFoundException;
use Domain\Repositories\RateRepositoryInterface;

final class DeleteRateHandler
{
    public function __construct(
        private RateRepositoryInterface $rateRepository,
    ) {}

    public function handle(DeleteRateCommand $command): void
    {
        $rate = $this->rateRepository->findOneById($command->getId());

        if (! $rate) {
            throw new RateNotFoundException();
        }

        $this->rateRepository->delete($rate);
    }
}
