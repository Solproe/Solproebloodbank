<?php

namespace App\Console;

use App\Models\ValidateReceived\ValidateReceivedModel;
use App\Services\FirebaseMessaging;
use App\Services\FirebaseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $messaging;

    protected $firebase;

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $this->firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $schedule->call(function ()
        {
            $validateReceived = ValidateReceivedModel::all();

            foreach ($validateReceived as $validate)
            {
                $request = $validate;

                if (strtotime(date(Carbon::now(env('TIMEZONE')))) < strtotime(date($validate->date)))
                {
                    //continue
                }
                else
                {
                    $this->messaging = new FirebaseMessaging($this->firebase->getFirebase());

                    try
                    {
                        $this->messaging->send($request);
                    }
                    catch (Exception $e)
                    {
                        dd($e);
                    }
                }
            }
        })->everyTwoMinutes();


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
