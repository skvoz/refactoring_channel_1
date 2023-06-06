<?php

namespace Tests\unit\api;

use PHPUnit\Framework\TestCase;
use Services\api\FakeServiceClient;

class FakeServiceClientTest extends TestCase
{
    public function testRun()
    {
        $service = new FakeServiceClient();

        $this->assertEquals('FName LName', $service->run());
    }

    public function testRunException()
    {
        $this->expectExceptionMessage('Fake service exception');

        $service = new FakeServiceClient();

        $service->isDebug();

        $service->run();
    }
}
