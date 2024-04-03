<?php

namespace Jimmeak\Youtube\Graph;

use InvalidArgumentException;
use Iterator;
use Override;

class VertexCollection implements Iterator
{
    private int $position = 0;
    private array $vertices = [];

    public function add(Vertex $vertex): void
    {
        if (!$this->has($vertex)) {
            $this->vertices[] = $vertex;
        }
    }

    public function remove(Vertex $vertex): void
    {
        foreach ($this->vertices as $index => $innerVertex) {
            if ($innerVertex->isSameAs($vertex)) {
                unset($this->vertices[$index]);
                break;
            }
        }
    }

    public function addVerticesFromEdge(Edge $edge): void
    {
        if (!$this->has($edge->getStart())) {
            $this->add($edge->getStart());
        }

        if (!$this->has($edge->getEnd())) {
            $this->add($edge->getEnd());
        }
    }

    public function has(Vertex $vertex): bool
    {
        foreach ($this->vertices as $innerVertex) {
            if ($innerVertex->isSameAs($vertex)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return Vertex[]
     */
    public function all(): array
    {
        return $this->vertices;
    }

    #[Override] 
    public function current(): Vertex
    {
        return $this->vertices[$this->position];
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
        return isset($this->vertices[$this->position]);
    }

    #[Override] 
    public function rewind(): void
    {
        $this->position = 0;
    }
}