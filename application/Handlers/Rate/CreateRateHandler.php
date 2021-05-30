<?php
declare(strict_types=1);

namespace Application\Handlers\Rate;

use Application\Commands\Rate\CreateRateCommand;
use Domain\Entities\Rate;
use Domain\Exceptions\RateAlreadyExistsException;
use Domain\Exceptions\TechnologyNotFoundException;
use Domain\Repositories\RateRepositoryInterface;
use Domain\Repositories\TechnologyRepositoryInterface;

final class CreateRateHandler
{
    public function __construct(
        private RateRepositoryInterface $rateRepository,
        private TechnologyRepositoryInterface $technologyRepository,
    ) {}

    public function handle(CreateRateCommand $command): void
    {
        $technology = $this->technologyRepository->findOneById(
            $command->getTechnologyId()
        );

        if (! $technology) {
            throw new TechnologyNotFoundException();
        }

        if (
            $this->rateRepository->exists(
                $command->getTechnologyId(),
                $command->getSeniority(),
                $command->getLanguage(),
                $command->getCurrency(),
            )
        ) {
            throw new RateAlreadyExistsException();
        }

        $rate = Rate::create(
            $technology,
            $command->getSeniority(),
            $command->getLanguage(),
            $command->getAverageSalaryInCents(),
            $command->getGrossMarginInCents(),
            $command->getCurrency()
        );

        $this->rateRepository->save($rate);
    }
}
