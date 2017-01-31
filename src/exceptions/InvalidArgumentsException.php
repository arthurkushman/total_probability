<?php
namespace tp\exception;

class InvalidArgumentsException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}