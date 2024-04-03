<?php

namespace Jimmeak\Youtube\Graph;

final readonly class Vertex
{
    public function __construct(
        private string $name,
    ) {
    }

    public function isSameAs(Vertex $vertex): bool
    {
        return $this->getName() === $vertex->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }
}