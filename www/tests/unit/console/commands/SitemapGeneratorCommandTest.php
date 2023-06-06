<?php

namespace Tests\unit\console\commands;

use Monsterlane\Testing\Concerns\InteractsWithConsole;
use Services\domain\SitemapGeneratorService;
use Tests\TestCase;

class SitemapGeneratorCommandTest extends TestCase
{
    use InteractsWithConsole;

    public function testHandleException()
    {
        $errorMessage = 'aaa!';
        $mockSitemapGeneratorService = $this
            ->getMockBuilder(SitemapGeneratorService::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->onlyMethods(['run'])
            ->getMock();

        $content = '<xml></xml>';

        $mockSitemapGeneratorService
            ->expects($this->once())
            ->method('run')
            ->with(
                self::callback(fn ($value): bool => preg_match('/.*([a-f0-9]{32})_sitemap\.xml$/', $value)),
                $content
            )
            ->willThrowException(new \Exception($errorMessage));

        $this->app->instance(SitemapGeneratorService::class, $mockSitemapGeneratorService);

        $this->artisan('sitemap-generation')
            ->expectsOutput('Error:' . $errorMessage);
    }

    public function testHandle()
    {
        $mockSitemapGeneratorService = $this
            ->getMockBuilder(SitemapGeneratorService::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->onlyMethods(['run'])
            ->getMock();

        $content = '<xml></xml>';

        $mockSitemapGeneratorService
            ->expects($this->once())
            ->method('run')
            ->with(
                self::callback(fn ($value): bool => preg_match('/.*([a-f0-9]{32})_sitemap\.xml$/', $value)),
                $content
            );

        $this->app->instance(SitemapGeneratorService::class, $mockSitemapGeneratorService);

        $this->artisan('sitemap-generation')
            ->expectsOutput('sitemap generator done!');
    }
}
