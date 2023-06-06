<?php

namespace Services\domain;

/**
 * generate random xml file, set in tmp folder
 */
class SitemapGeneratorService
{
    public function run($path, $content): void
    {
        file_put_contents($path, $content);
    }
}
