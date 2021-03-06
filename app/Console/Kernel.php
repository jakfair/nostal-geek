<?php

namespace App\Console;

use App\defi;
use App\fiche;
use App\fichestored;
use App\liendefi;
use App\liensucces;
use App\success;
use App\successtored;
use App\timers;
use Carbon\Carbon;
use DateInterval;
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
        $schedule->call(function(){ //générations trois propositions d'oeuvres pour chaque catégorie et reset liensucces//
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
            $timer = timers::find(1);
            $datetime1 = date_create($timer->timehebdomadaire);
            $interval = new DateInterval('P7D');
            $datetime1->add($interval);
            $timer->timehebdomadaire = $datetime1;
            $timer->save();
        })->timezone('Europe/Paris')->weekly()->mondays()->at('12:00');


        $schedule->call(function(){ //générations trois succès pour chaque catégorie//
            successtored::truncate();
            liensucces::truncate();

            $propaljeu = success::where('type','=', 'jeu')->where('status','=','confirme')->inRandomOrder()->take(3)->get();
            $propalanime = success::where('type','=', 'anime')->where('status','=','confirme')->inRandomOrder()->take(3)->get();
            $propalcinema = success::where('type','=', 'cinema')->where('status','=','confirme')->inRandomOrder()->take(3)->get();
            foreach ($propaljeu as $jeu){
                $successtored = new successtored();
                $successtored->idsuccess = $jeu->id;
                $successtored->save();
            }
            foreach ($propalanime as $anime){
                $successtored = new successtored();
                $successtored->idsuccess = $anime->id;
                $successtored->save();
            }
            foreach ($propalcinema as $cinema){
                $successtored = new successtored();
                $successtored->idsuccess = $cinema->id;
                $successtored->save();
            }


        })->timezone('Europe/Paris')->weekly()->mondays()->at('12:00');

        $schedule->call(function(){ //reset défi journalier tout les jours a midi//
            $defis = defi::join('liendefi', function($join)
            {
                $join->on('liendefi.iddefi', '=', 'defis.id');
            })->where('defis.categorie','=','quotidien')->select('*','liendefi.id as liendefi_id')->get();
            foreach ($defis as $defi){
                $res=liendefi::where('id','=',$defi->liendefi_id)->delete();
            }
            $timer = timers::find(1);
            $datetime1 = date_create($timer->timequotidien);
            $interval = new DateInterval('P1D');
            $datetime1->add($interval);
            $timer->timequotidien = $datetime1;
            $timer->save();
        })->timezone('Europe/Paris')->daily()->at('12:00');

        $schedule->call(function(){ //reset défi hebdomadaires tout les lundi a midi//
            $defis = defi::join('liendefi', function($join)
            {
                $join->on('liendefi.iddefi', '=', 'defis.id');
            })->where('defis.categorie','=','hebdomadaire')->select('*','liendefi.id as liendefi_id')->get();
            foreach ($defis as $defi){
                $res=liendefi::where('id','=',$defi->liendefi_id)->delete();
            }

        })->timezone('Europe/Paris')->weekly()->mondays()->at('12:00');


        $schedule->call(function(){ //reset défi mensuel tout les mois le premier jour a midi//
            $defis = defi::join('liendefi', function($join)
            {
                $join->on('liendefi.iddefi', '=', 'defis.id');
            })->where('defis.categorie','=','mensuel')->select('*','liendefi.id as liendefi_id')->get();
            foreach ($defis as $defi){
                $res=liendefi::where('id','=',$defi->liendefi_id)->delete();
            }
            $timer = timers::find(1);
            $datetime1 = date_create($timer->timemensuel);
            $interval = new DateInterval('P1M');
            $datetime1->add($interval);
            $timer->timemensuel = $datetime1;
            $timer->save();
        })->timezone('Europe/Paris')->monthlyOn(1, '12:00');
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
