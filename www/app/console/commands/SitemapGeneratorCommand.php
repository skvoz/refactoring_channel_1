<?php

namespace App\console\commands;

use Illuminate\Console\Command;
use Services\domain\SitemapGeneratorService;

class SitemapGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap-generation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run sitemap generator';

    /**
     * Execute the console command.
     */
    public function handle(SitemapGeneratorService $service): void
    {
        try {
            $content = '<xml></xml>';
            $service->run(dirname(__DIR__) . '/../../tmp/' . md5(time()) . '_sitemap.xml', $content);
        } catch (\Exception $e) {
            $this->error('Error:' . $e->getMessage());
        }

        $this->info('sitemap generator done!');
    }
}
