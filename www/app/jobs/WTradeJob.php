<?php

namespace App\jobs;

use App\exceptions\JobException;
use Services\domain\WTradeApiToOpencart2Service;
use Services\NotificationService;

/**
 * job for WTradeApiToOpencart2Service service
 */
class WTradeJob extends Job
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        WTradeApiToOpencart2Service $wTradeApiToOpencart2Service,
        NotificationService         $notificationService
    ) {
        try {
            $wTradeApiToOpencart2Service->run();
        } catch (\Exception $e) {
            $notificationService->write(
                'incorrect work wtrade service.',
                NotificationService::ERROR_CONTEXT
            );

            throw new JobException($e->getMessage(), $e->getCode());
        }

        $notificationService->write('success work wtrade service');
    }
}
