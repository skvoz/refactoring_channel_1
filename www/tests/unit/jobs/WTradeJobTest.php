<?php

namespace Tests\unit\jobs;

use App\jobs\WTradeJob;
use Illuminate\Support\Facades\Queue;
use Services\domain\WTradeApiToOpencart2Service;
use Services\NotificationService;
use Tests\TestCase;

class WTradeJobTest extends TestCase
{
    public function testHandle()
    {
        $wTradeApiToOpencart2ServiceMock = $this->createStub(WTradeApiToOpencart2Service::class);

        $notificationServiceMock = $this->createMock(NotificationService::class);

        $wTradeApiToOpencart2ServiceMock
            ->expects($this->once())
            ->method('run');

        $notificationServiceMock
            ->expects($this->once())
            ->method('write')
            ->with('success work wtrade service');
        $job = new WTradeJob();

        $job->handle($wTradeApiToOpencart2ServiceMock, $notificationServiceMock);
    }

    public function testExceptionHandle()
    {
        $this->expectExceptionMessage('aaa!');
        $this->expectExceptionCode(555);

        $wTradeApiToOpencart2ServiceMock = $this->createStub(WTradeApiToOpencart2Service::class);

        $notificationServiceMock = $this->createMock(NotificationService::class);

        $wTradeApiToOpencart2ServiceMock
            ->expects($this->once())
            ->method('run')
            ->willThrowException(new \Exception('aaa!', 555));

        $notificationServiceMock
            ->expects($this->once())
            ->method('write')
            ->with('incorrect work wtrade service.', NotificationService::ERROR_CONTEXT);

        $job = new WTradeJob();

        $job->handle($wTradeApiToOpencart2ServiceMock, $notificationServiceMock);
    }
}
