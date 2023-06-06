<?php

namespace Tests\unit\domain;

use PHPUnit\Framework\TestCase;
use Services\domain\SitemapGeneratorService;

class SitemapGeneratorServiceTest extends TestCase
{
    /**
     * @var string
     */
    private string $path;

    public function tearDown(): void
    {
        unlink($this->path);
    }

    public function testRun()
    {
        $service = new SitemapGeneratorService();
        $this->path = __DIR__ . '/../../tmp/' . time() . '_tmp.tmp';
        $service->run($this->path, 'test');
        $this->assertEquals('test', file_get_contents($this->path));
    }
}
