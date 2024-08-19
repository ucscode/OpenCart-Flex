<?php

namespace Opencart\Kits\Exception;

use Exception;

class FileAccessException extends Exception
{
    public const MESSAGE = 'Cannot access the file "%s"';
}