<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\SendNotificationEmails; 

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendNotificationEmails::class, 
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule the 'app:send-notification-emails' command to run daily at 9:00 PM
        $schedule->command('app:send-notification-emails')->dailyAt('21:00');
    }

    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->command('emails:send-notifications')->dailyAt('21:00');
    // }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
