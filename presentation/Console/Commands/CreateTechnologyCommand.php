<?php
declare(strict_types=1);

namespace Presentation\Console\Commands;

use Application\Handlers\Technology\CreateTechnologyHandler;
use Illuminate\Console\Command;
use InvalidArgumentException;

final class CreateTechnologyCommand extends Command
{
    protected $signature = 'technology:create {name}';
    protected $description = 'Create a new technology';

    public function __construct(
        private CreateTechnologyHandler $createTechnologyHandler,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        if (! $this->hasArgument('name')) {
            throw new InvalidArgumentException('"name" argument is required');
        }

        $name = $this->argument('name');

        $command = new \Application\Commands\Technology\CreateTechnologyCommand($name);

        $this->createTechnologyHandler->handle($command);

        $this->info('Technology was created! :)');
    }
}
