<?php
namespace Tremby\LaravelGitVersion\Exception;

use RuntimeException;

class CouldNotGetVersionException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Error in  class");
    }
}
