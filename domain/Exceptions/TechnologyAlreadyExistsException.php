<?php
declare(strict_types=1);

namespace Domain\Exceptions;

use Exception;
use Throwable;

final class TechnologyAlreadyExistsException extends Exception
{
    public function __construct(
        string $message = 'Technology already exists',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
