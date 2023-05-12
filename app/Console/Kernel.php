<?php

namespace App\Console;

use App\Models\ValidateReceived\ValidateReceivedModel;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function ()
        {
            $validateReceived = ValidateReceivedModel::all();

            foreach ($validateReceived as $validate)
            {
                if (strtotime(date(Carbon::now(env('TIMEZONE')))) < strtotime(date($validate->date)))
                {
                    //continue
                }
                else
                {
                    //code
                }
            }
        })->everyThreeHours();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
