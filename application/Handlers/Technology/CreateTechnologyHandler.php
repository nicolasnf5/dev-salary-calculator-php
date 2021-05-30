<?php
declare(strict_types=1);

namespace Application\Handlers\Technology;

use Application\Commands\Technology\CreateTechnologyCommand;
use Domain\Entities\Technology;
use Domain\Exceptions\TechnologyAlreadyExistsException;
use Domain\Repositories\TechnologyRepositoryInterface;

final class CreateTechnologyHandler
{
    public function __construct(
        private TechnologyRepositoryInterface $technologyRepository,
    ) {}

    public function handle(CreateTechnologyCommand $command): void
    {
        $technology = $this->technologyRepository->findOneByName(
            $command->getName(),
        );

        if ($technology) {
            throw new TechnologyAlreadyExistsException();
        }

        $technology = Technology::create(
            $command->getName(),
        );

        $this->technologyRepository->save($technology);
    }
}
