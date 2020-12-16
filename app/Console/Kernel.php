<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\Payment;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        

        $schedule->call(function () {
            $Payment = Payment::where('status',1)->get();
            $stripe = new \Stripe\StripeClient(
                'sk_test_R5yp5YcSzHXQFP41vvKCSh9v'
            );
            $time = date('Y-m-d H:i:s');
            foreach($Payment as $val){
                $date=date('Y-m-d H:i:s', $val->current_period_end);
                if($date < $time){
                    $retrive= $stripe->subscriptions->retrieve(
                        $val->subscription_id,
                        []
                    );
                    $subscribe = array(
                        'current_period_start'  => $retrive->current_period_start,
                        'current_period_end'    => $retrive->current_period_end,
                    );
                    Payment::where('subscription_id',$val->subscription_id)->update($subscribe);
                }
            }
        })->daily();
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
