<?php

namespace App\Console;

use App\fiche;
use App\fichestored;
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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            fichestored::truncate();
            $propaljeu = fiche::where('animejeu.type','=', 'jeu')->inRandomOrder()->limit(3)->get();
            $propalanime = fiche::where('animejeu.type','=', 'anime')->inRandomOrder()->limit(3)->get();
            $propalcinema = fiche::where('animejeu.type','=', 'cinema')->inRandomOrder()->limit(3)->get();
            foreach ($propaljeu as $jeu){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $jeu->id;
                $fichestored->saved();
            }
            /*foreach ($propalanime as $anime){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $anime->id;
                $fichestored->saved();
            }
            foreach ($propalcinema as $cinema){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $cinema->id;
                $fichestored->saved();
            }*/
        })->EveryMinute();
        $schedule->call(function(){

        })->EveryMinute();
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
