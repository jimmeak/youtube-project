<?php

namespace Jimmeak\Youtube\Graph;

final readonly class WeightedEdge extends Edge
{
    public function __construct(
        Vertex $start,
        Vertex $end,
        private int $weight,
    ) {
        parent::__construct($start, $end);
    }

    public function getWeight(): int
    {
        return $this->weight;
    }
}