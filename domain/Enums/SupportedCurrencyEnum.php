<?php
declare(strict_types=1);

namespace Domain\Enums;

use MyCLabs\Enum\Enum;

class SupportedCurrencyEnum extends Enum
{
    public const USD = 'usd';
    public const ARS = 'ars';
}
