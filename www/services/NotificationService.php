<?php

namespace Services;

use Illuminate\Support\Facades\Redis;

/**
 * @TODO notification service need realisation
 */
class NotificationService
{
    private \Illuminate\Redis\Connections\Connection $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }
    public const SUCCESS_CONTEXT = 'success';
    public const ERROR_CONTEXT = 'error';
    /**
     * @param string $message 'aaaaa!'
     * @param string $context [success = default, error]
     * @return void
     */
    public function read(): array
    {
        $result = $this->redis->lRange('test', 0, -1);

        return $result ?? [];
    }

    public function write(string $message, string $context='success')
    {
        $this->redis->rPush('test', json_encode([$context => $message]));
    }
}
