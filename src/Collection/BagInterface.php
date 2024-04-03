<?php

namespace Jimmeak\Youtube\Collection;

interface BagInterface
{
    public function set(int|string $key, mixed $item): void;

    public function remove(int|string $key): void;

    public function all(): array;

    public function clear(): void;

    public function get(int|string $key, mixed $default = null): mixed;

    public function has(int|string $key): bool;
}