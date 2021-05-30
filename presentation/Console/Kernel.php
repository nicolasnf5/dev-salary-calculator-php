<?php
declare(strict_types=1);

namespace Presentation\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Presentation\Console\Commands\CreateTechnologyCommand;
use Presentation\Console\Commands\EditTechnologyCommand;
use Presentation\Console\Commands\ListTechnologiesCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     * @var array
     */
    protected $commands = [
        CreateTechnologyCommand::class,
        EditTechnologyCommand::class,
        ListTechnologiesCommand::class,
    ];

    /**
     * Define the application's command schedule.
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }

    /**
     * Register the commands for the application.
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
