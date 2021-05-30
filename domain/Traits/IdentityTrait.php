<?php
declare(strict_types=1);

namespace Domain\Traits;

trait IdentityTrait
{
    public function getId(): int
    {
        return $this->id;
    }
}
