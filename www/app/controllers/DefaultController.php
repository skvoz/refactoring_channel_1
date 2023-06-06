<?php

namespace App\controllers;

use App\jobs\WTradeJob;
use Illuminate\Support\Facades\Queue;
use Services\domain\SitemapGeneratorService;
use Services\domain\WTradeApiToOpencart2Service;
use Services\NotificationService;

/**
 * default controller
 */
class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        return view('index');
    }

    /**
     * @param SitemapGeneratorService $service
     * @return string
     */
    public function sitemapGenerator(SitemapGeneratorService $service): string
    {
        $content = view('sitemap_xml');
        $service->run(dirname(__DIR__) . '/../tmp/' . md5(time()) . '_sitemap.xml', $content);

        return view('sitemap_generator');
    }

    /**
     * @param WTradeApiToOpencart2Service $service
     * @return string
     */
    public function wTradeApiToOpencart2(WTradeJob $job): string
    {
        Queue::push($job);

        return view('wtrade');
    }

    /**
     * @return string
     */
    public function test(): string
    {
        return view('test');
    }

    /**
     * @param NotificationService $notificationService
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function notifications(NotificationService $notificationService)
    {
        $notifications = $notificationService->read();

        return view('notification', [
            'notifications' => $notifications,
        ]);
    }
}
