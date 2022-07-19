<?php

namespace FlyCorp\CorreiosRastreio;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\RuntimeException;

class RastreioCorreiosHelper
{
    /**
     * Get the app's version string
     *
     * If a file <base>/version exists, its contents are trimmed and used.
     * Otherwise we get a suitable string from `git describe`.
     *
     * @throws Exception\CouldNotGetVersionException if there is no version file and `git
     * describe` fails
     * @return string Version string
     */
    public static function getTraking($code)
    {
       return $code;
    }
   
}
