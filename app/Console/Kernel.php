<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\GetBookingEngineReservations::class,
        Commands\ModifyBookingEngineInventory::class,
        Commands\UpdateInventoryCommand::class,
        Commands\UpdateTodayInventoryCommand::class,
        Commands\UpdatePreview::class,
        Commands\KillQueue::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('cr:get_reservations cm_reservas')->everyMinute();
        $schedule->command('kill:queue')->everyFiveMinutes();
        $schedule->command('rategain:update_inventory')->cron('0 */6 * * *');
        $schedule->command('rategain:update_inventory')->twiceDaily(6, 9);
        $schedule->command('rategain:update_inventory')->twiceDaily(12, 17);
        $schedule->command('rategain:update_inventory')->twiceDaily(1, 20);
        $schedule->command('rategain:update_today_inventory')->twiceDaily(8, 11);
        $schedule->command('rategain:update_today_inventory')->twiceDaily(15, 20);
        // start the queue daemon, if its not running
        if (!$this->osProcessIsRunning('queue:work')) {
            $schedule->command('queue:work --tries=3')->everyMinute();
        }
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

	/**
     * checks, if a process with $needle in the name is running
     *
     * @param string $needle
     * @return bool
     */
    protected function osProcessIsRunning($needle)
    {
        // get process status. the "-ww"-option is important to get the full output!
        exec('ps aux -ww', $process_status);

        // search $needle in process status
        $result = array_filter($process_status, function ($var) use ($needle) {
            return strpos($var, $needle);
        });

        // if the result is not empty, the needle exists in running processes
        if (!empty($result)) {
            return true;
        }

        return false;
    }
}
