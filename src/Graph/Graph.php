<?php

namespace Jimmeak\Youtube\Graph;

use InvalidArgumentException;
use JsonSerializable;

abstract readonly class Graph implements JsonSerializable
{
    final private function __construct(
        private VertexCollection $vertices,
        private EdgeCollection   $edges,
    ) {
    }

    public static function create(VertexCollection $vertexCollection, EdgeCollection $edgeCollection): static
    {
        self::validateInputs($vertexCollection, $edgeCollection);

        return new static($vertexCollection, $edgeCollection);
    }

    public function getVerticies(): VertexCollection
    {
        return $this->vertices;
    }

    public function getEdges(): EdgeCollection
    {
        return $this->edges;
    }

    public function jsonSerialize(): string
    {
        return json_encode([
            'vertices' => $this->vertices->all(),
            'edges' => $this->edges->all(),
        ]);
    }

    public function addVertex(Vertex $vertex): void
    {
        $this->vertices->add($vertex);
    }

    public function removeVertex(Vertex $vertex): void
    {
        $this->vertices->remove($vertex);
    }

    public function setEdge(Edge $edge, bool $autoInsertVertices = false): void
    {
        foreach ($this->edges as $innerEdge) {
            if ($innerEdge->isSameAs($edge)) {
                $this->edges->remove($innerEdge);
            }
        }

        $this->edges->add($edge);
        if ($autoInsertVertices) {
            $this->vertices->addVerticesFromEdge($edge);
        }

        self::validateInputs($this->vertices, $this->edges);
    }

    public function removeEdge(Edge $edge): void
    {
        $this->edges->remove($edge);
    }

    protected static function validateInputs(VertexCollection $vertexCollection, EdgeCollection $edgeCollection): void
    {
        if (empty($vertexCollection->all())) {
            throw new InvalidArgumentException('Graph must have at least one vertex');
        }

        foreach ($edgeCollection as $edge) {
            $hasStart = $vertexCollection->has($edge->getStart());
            $hasEnd = $vertexCollection->has($edge->getEnd());

            if (!$hasStart || !$hasEnd) {
                throw new InvalidArgumentException('Edge must have valid start and end vertices.');
            }
        }
    }

}