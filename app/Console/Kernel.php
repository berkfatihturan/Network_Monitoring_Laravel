<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected $commands = [
        Commands\CheckDatabase::class,
        Commands\CheckPorts::class,
        Commands\CheckTemp::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:check-database')->everyTwoMinutes()->runInBackground();
        $schedule->command('app:check-ports')->everyTwoMinutes()->runInBackground();
        $schedule->command('app:check-temp')->everyFifteenMinutes()->runInBackground();

        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
