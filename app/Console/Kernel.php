<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
        $definitions = \App\Definitions::all();
        foreach ( $definitions as $definition){
            $definition->votes_up = \App\Votes::where('definition_id', $definition->id)
            ->where('vote',1)
            ->count();
            $definition->votes_down = \App\Votes::where('definition_id',$definition->id)
            ->where('vote',0)
            ->count();
            if($definition->sanitisedDefinition == "")
                $definition->destroy($definition->id);
            $definition->update();
        }   

        })->everyMinute(); 
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
