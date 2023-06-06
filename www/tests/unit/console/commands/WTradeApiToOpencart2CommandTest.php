<?php

namespace Tests\unit\console\commands;

use Monsterlane\Testing\Concerns\InteractsWithConsole;
use Services\domain\WTradeApiToOpencart2Service;
use Tests\TestCase;

class WTradeApiToOpencart2CommandTest extends TestCase
{
    use InteractsWithConsole;

    public function testHandleException()
    {
        $errorMessage = 'aaa!';
        $mockSitemapGeneratorService = $this
            ->getMockBuilder(WTradeApiToOpencart2Service::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->onlyMethods(['run'])
            ->getMock();

        $mockSitemapGeneratorService
            ->expects($this->once())
            ->method('run')
            ->willThrowException(new \Exception($errorMessage));

        $this->app->instance(WTradeApiToOpencart2Service::class, $mockSitemapGeneratorService);

        $this->artisan('wtrade-api-opencart2')
            ->expectsOutput('Error:' . $errorMessage);
    }

    public function testHandle()
    {
        $mockSitemapGeneratorService = $this
            ->getMockBuilder(WTradeApiToOpencart2Service::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->onlyMethods(['run'])
            ->getMock();

        $mockSitemapGeneratorService
            ->expects($this->once())
            ->method('run');

        $this->app->instance(WTradeApiToOpencart2Service::class, $mockSitemapGeneratorService);

        $this->artisan('wtrade-api-opencart2')
            ->expectsOutput('wtrade api to opencart2 done!');
    }
}
