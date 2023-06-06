<?php

namespace Tests\feature;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class CheckEndpointTest extends TestCase
{
    use DatabaseMigrations;

    public function testTestPage()
    {
        $this->get('/test');

        $this->assertEquals('<p>Hello world!</p>', $this->response->getContent());
    }

    public function testWTradeApiToOpencart2()
    {
        $this->get('/w-trade-api-to-opencart2');
        $this->assertEquals('<p>wtrade api to opencart2 running</p>', $this->response->getContent());
    }

    public function testSitemapGenerator()
    {
        $this->get('/sitemap-generator');
        $this->assertEquals('<p>sitemap generation running</p>', $this->response->getContent());
    }

    public function testHomepage()
    {
        $this->get('/');
        $this->assertTrue($this->response->isOk());
    }

    public function testNotification()
    {
        $this->get('/notifications');
        $this->assertTrue($this->response->isOk());
    }
}
