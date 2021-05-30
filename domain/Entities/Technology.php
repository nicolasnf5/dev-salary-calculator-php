<?php
declare(strict_types=1);

namespace Domain\Entities;

use Domain\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use IdentityTrait;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public static function create(string $name): self
    {
        $technology = new self();
        $technology->setName($name);

        return $technology;
    }

    public function edit(string $name): self
    {
        $this->setName($name);

        return $this;
    }
}
