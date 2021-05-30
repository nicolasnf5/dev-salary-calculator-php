<?php
declare(strict_types=1);

namespace Application\Handlers\Technology;

use Application\Commands\Technology\EditTechnologyCommand;
use Domain\Exceptions\TechnologyNotFoundException;
use Domain\Repositories\TechnologyRepositoryInterface;

final class EditTechnologyHandler
{
    public function __construct(
        private TechnologyRepositoryInterface $technologyRepository,
    ) {}

    public function handle(EditTechnologyCommand $command): void
    {
        $technology = $this->technologyRepository->findOneById(
            $command->getId(),
        );

        if (! $technology) {
            throw new TechnologyNotFoundException();
        }

        $technology->edit($command->getName());

        $this->technologyRepository->save($technology);
    }
}
