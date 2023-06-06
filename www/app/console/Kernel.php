<?php

namespace App\console;

use App\console\commands\SitemapGeneratorCommand;
use App\console\commands\WTradeApiToOpencart2Command;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SitemapGeneratorCommand::class,
        WTradeApiToOpencart2Command::class,
    ];


    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
