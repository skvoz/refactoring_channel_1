<?php

namespace Services\api;

/**
 * service return random first name, last name. From time to time generate exception
 */
class FakeServiceClient implements InterfaceServiceClient
{
    /**
     * @var true
     */
    private bool $isDebug = false;

    public function isDebug()
    {
        $this->isDebug = true;
    }

    public function run()
    {
        if ($this->isDebug) {
            throw new \Exception('Fake service exception', 400);
        }

        $fName = 'FName';
        $lName = 'LName';

        return $fName . ' ' . $lName;
    }
}
