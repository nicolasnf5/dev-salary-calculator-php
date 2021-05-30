<?php
declare(strict_types=1);

namespace Domain\Exceptions;

use Exception;
use Throwable;

final class RateNotFoundException extends Exception
{
    public function __construct(
        string $message = 'Rate not found',
        int $code = 404,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
