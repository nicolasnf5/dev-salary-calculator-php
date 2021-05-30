<?php
declare(strict_types=1);

namespace Presentation\Console\Commands;

use Application\Handlers\Technology\EditTechnologyHandler;
use Illuminate\Console\Command;
use InvalidArgumentException;

final class EditTechnologyCommand extends Command
{
    protected $signature = 'technology:edit {id} {name}';
    protected $description = 'Edit a specific technology';

    public function __construct(
        private EditTechnologyHandler $editTechnologyHandler,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        if (! $this->hasArgument('id')) {
            throw new InvalidArgumentException('"id" argument is required');
        }

        if (! $this->hasArgument('name')) {
            throw new InvalidArgumentException('"name" argument is required');
        }

        $id = (int) $this->argument('id');
        $name = $this->argument('name');

        $command = new \Application\Commands\Technology\EditTechnologyCommand($id, $name);

        $this->editTechnologyHandler->handle($command);

        $this->info('Technology was edited! :)');
    }
}
