<?php

namespace App\Exceptions;

use Exception;

class ExchangeEnrollmentWithoutShiftException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param string $message
     */
    public function __construct($message = 'Cannot exchange an enrollment that does not have an associated shift.')
    {
        parent::__construct($message);
    }
}