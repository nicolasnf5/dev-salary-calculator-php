<?php
declare(strict_types=1);

namespace Domain\Enums;

use MyCLabs\Enum\Enum;

class SeniorityEnum extends Enum
{
    public const JUNIOR = 'junior';
    public const SEMI_SENIOR = 'semi_senior';
    public const SENIOR = 'senior';
}
