<?php

namespace Jimmeak\Youtube\Graph;

use InvalidArgumentException;
use Iterator;
use Override;

class EdgeCollection implements Iterator
{
    private int $position = 0;
    private array $edges = [];

    public function add(Edge $edge): void
    {
        if (!$this->has($edge)) {
            $this->edges[] = $edge;
        }
    }

    public function remove(Edge $edge): void
    {
        foreach ($this->edges as $index => $edge) {
            if ($edge->isSameAs($edge)) {
                unset($this->edges[$index]);
                return;
            }
        }
    }

    private function has(Edge $edge): bool
    {
        foreach ($this->edges as $innerEdge) {
            if ($innerEdge->isSameAs($edge)) {
                return true;
            }
        }

        return false;
    }

    public function all(): array
    {
        return $this->edges;
    }

    #[Override]
    public function current(): Edge
    {
        return $this->edges[$this->position];
    }

    #[Override]
    public function next(): void
    {
        ++$this->position;
    }

    #[Override]
    public function key(): int
    {
        return $this->position;
    }

    #[Override]
    public function valid(): bool
    {
        return isset($this->edges[$this->position]);
    }

    #[Override]
    public function rewind(): void
    {
        $this->position = 0;
    }
}