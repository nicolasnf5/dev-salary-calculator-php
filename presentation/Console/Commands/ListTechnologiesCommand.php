<?php
declare(strict_types=1);

namespace Presentation\Console\Commands;

use Domain\Repositories\TechnologyRepositoryInterface;
use Illuminate\Console\Command;

final class ListTechnologiesCommand extends Command
{
    protected $signature = 'technology:list';
    protected $description = 'List all the technologies with Id and Name';

    public function __construct(
        private TechnologyRepositoryInterface $technologyRepository,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $technologies = $this->technologyRepository->findAll();

        foreach ($technologies as $technology) {
            $this->line(
                "Id: " .
                str_pad((string) $technology->getId(), 4, " ", STR_PAD_LEFT) .
                " - Name: {$technology->getName()}"
            );
        }

        $this->info('Technology list was displayed! :)');
    }
}
