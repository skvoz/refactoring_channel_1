<?php

namespace App\console\commands;

use Illuminate\Console\Command;
use Services\domain\WTradeApiToOpencart2Service;

class WTradeApiToOpencart2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wtrade-api-opencart2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run wtrade api to opencart2';

    /**
     * Execute the console command.
     */
    public function handle(WTradeApiToOpencart2Service $service): void
    {
        try {
            $service->run();
        } catch (\Exception $e) {
            $this->error('Error:' . $e->getMessage());
        }

        $this->info('wtrade api to opencart2 done!');
    }
}
