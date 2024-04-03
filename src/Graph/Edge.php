<?php

namespace Jimmeak\Youtube\Graph;

readonly class Edge
{
    public function __construct(
        protected Vertex $start,
        protected Vertex $end,
    ) {
    }

    public function isSameAs(Edge $edge): bool
    {
        return $this->getStart() === $edge->getStart()
            && $this->getEnd() === $edge->getEnd();
    }

    public function getStart(): Vertex
    {
        return $this->start;
    }

    public function getEnd(): Vertex
    {
        return $this->end;
    }
}