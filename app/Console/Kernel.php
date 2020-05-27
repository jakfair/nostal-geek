<?php

namespace App\Console;

use App\defi;
use App\fiche;
use App\fichestored;
use App\liendefi;
use App\successtored;
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
            $propaljeu = fiche::where('animejeu.type','=', 'jeu')->where('animejeu.status','=','confirme')->inRandomOrder()->limit(3)->get();
            $propalanime = fiche::where('animejeu.type','=', 'anime')->where('animejeu.status','=','confirme')->inRandomOrder()->limit(3)->get();
            $propalcinema = fiche::where('animejeu.type','=', 'cinema')->where('animejeu.status','=','confirme')->inRandomOrder()->limit(3)->get();
            foreach ($propaljeu as $jeu){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $jeu->id;
                $fichestored->save();
            }
            foreach ($propalanime as $anime){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $anime->id;
                $fichestored->save();
            }
            foreach ($propalcinema as $cinema){
                $fichestored = new fichestored();
                $fichestored->idoeuvre = $cinema->id;
                $fichestored->save();
            }
        })->timezone('Europe/Paris')->weekly()->mondays()->at('12:00');


        $schedule->call(function(){
            successtored::truncate();
            $propaljeu = succes::where('succes.type','=', 'jeu')->where('succes.status','=','confirme')->inRandomOrder()->limit(3)->get();
            $propalanime = succes::where('succes.type','=', 'anime')->where('succes.status','=','confirme')->inRandomOrder()->limit(3)->get();
            $propalcinema = succes::where('succes.type','=', 'cinema')->where('succes.status','=','confirme')->inRandomOrder()->limit(3)->get();
            foreach ($propaljeu as $jeu){
                $successtored = new successtored();
                $successtored->idsucccess = $jeu->id;
                $successtored->save();
            }
            foreach ($propalanime as $anime){
                $successtored = new successtored();
                $successtored->idsucccess = $anime->id;
                $successtored->save();
            }
            foreach ($propalcinema as $cinema){
                $successtored = new successtored();
                $successtored->idsucccess = $cinema->id;
                $successtored->save();
            }
        })->timezone('Europe/Paris')->weekly()->mondays()->at('12:00');

        $schedule->call(function(){
            $defis = defi::join('liendefi', function($join)
            {
                $join->on('liendefi.iddefi', '=', 'defis.id')->select('*','liendefi.id as liendefi_id');
            })->where('defis.categorie','=','quotidien')->get();
            foreach ($defis as $defi){
                $res=liendefi::where('id','=',$defi->liendefi_id)->delete();
            }

        })->timezone('Europe/Paris')->daily()->at('4:45');
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
