<?php

namespace Jimmeak\Youtube\Collection;

use InvalidArgumentException;
use Jimmeak\Youtube\Converter\PrimitiveTypeConverter;
use Jimmeak\Youtube\Primitive\Type;
use Jimmeak\Youtube\Sanitizing\StringSanitizer;
use LogicException;

/**
 * Class Bag
 * @package Jimmeak\Youtube\Collection
 */
final class Bag implements BagInterface
{
    public function __construct(
        private array $items = [],
    ) {
    }

    public static function new(array $items = []): Bag
    {
        return new self($items);
    }

    public function get(int|string $key, mixed $default = null, Type $asType = Type::NULL): mixed
    {
        if (!$this->has($key)) {
            return $default;
        }

        if (Type::NULL === $asType) {
            return $this->items[$key];
        }

        $sanitizer = new StringSanitizer();

        $value = PrimitiveTypeConverter::convert($this->items[$key], $asType);

        if (is_string($value)) {
            return $sanitizer($value);
        }

        return $value;
    }

    public function getBoolean(int|string $key, bool $default = false): bool
    {
        if (!$this->has($key)) {
            return $default;
        }

        $value = $this->items[$key];

        if (is_numeric($value) || is_bool($value)) {
            return $this->get($key, $default, Type::BOOLEAN);
        }

        throw new LogicException('This value can not be convert to Boolean.');
    }

    public function getInteger(int|string $key, int $default = 0): int
    {
        return $this->get($key, $default, Type::INTEGER);
    }

    public function getFloat(int|string $key, float $default = 0.0): float
    {
        return $this->get($key, $default, Type::FLOAT);
    }

    public function getString(int|string $key, string $default = ''): string
    {
        return $this->get($key, $default, Type::STRING);
    }

    public function set(int|string $key, mixed $item): void
    {
        $this->items[$key] = $item;
    }

    public function has(int|string $key): bool
    {
        return isset($this->items[$key]);
    }

    public function remove(int|string $key, bool $throwException = false): void
    {
        if (!$this->has($key) && $throwException) {
            throw new InvalidArgumentException("Key $key does not exist in the bag.");
        } elseif (!$this->has($key)) {
            return;
        }

        unset($this->items[$key]);
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function all(): array
    {
        foreach ($this->items as $key => $item) {
            $items[$key] = is_string($item) ? (new StringSanitizer())($item) : $item;
        }

        return $items ?? [];
    }
}