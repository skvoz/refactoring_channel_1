<?php

namespace Tests\feature\domain;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Services\api\FakeServiceClient;
use Services\domain\exceptions\WTradeApiToOpencart2ServiceException;
use Services\domain\WTradeApiToOpencart2Service;
use Tests\TestCase;

class WTradeApiToOpencart2ServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function testRun()
    {
        $service = new WTradeApiToOpencart2Service(new FakeServiceClient());
        $service->run();

        $this->seeInDatabase('Main', [
            'field1' => 'FName LName',
            'field2' => 'FName LName',
            'field3' => 'FName LName',
            'field4' => 'FName LName',
        ]);
    }

    public function testRunException()
    {
        $fakeService = $this->getMockBuilder(FakeServiceClient::class)
            ->onlyMethods(['run'])
            ->getMock();

        $matcher = $this->exactly(2);

        $fakeService->expects($matcher)
            ->method('run')
            ->will($this->onConsecutiveCalls(
                null,
                $this->throwException(new WTradeApiToOpencart2ServiceException('Fake service exception.', 400)),
                null,
                null
            ));

        try {
            $service = new WTradeApiToOpencart2Service($fakeService);

            $service->run();
        } catch (WTradeApiToOpencart2ServiceException $e) {
            $this->assertEquals('Rollback success.Fake service exception.', $e->getMessage());
            $this->notSeeInDatabase('Main', [
                'field1' => 'FName LName',
                'field2' => 'FName LName',
                'field3' => 'FName LName',
                'field4' => 'FName LName',
            ]);
        }
    }
}
