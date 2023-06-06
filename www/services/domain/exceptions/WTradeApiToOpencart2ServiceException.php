<?php

namespace Services\domain\exceptions;

class WTradeApiToOpencart2ServiceException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 400);
    }
}
