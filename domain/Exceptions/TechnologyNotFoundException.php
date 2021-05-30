<?php
declare(strict_types=1);

namespace Domain\Exceptions;

use Exception;
use Throwable;

final class TechnologyNotFoundException extends Exception
{
    public function __construct(
        string $message = 'Technology not found',
        int $code = 404,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
