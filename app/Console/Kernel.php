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
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:check-database')->everyMinute()->withoutOverlapping();
        $schedule->command('app:check-ports')->everyMinute()->withoutOverlapping();
        set_time_limit(60);
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
