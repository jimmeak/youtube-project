# What are Graphs?

We can define a set of vertices V and a set
of edges E as a graph G = (V, E);

- Vertices (singular Vertex) are nodes in a graph.
  We see them as a representation of states.
- Edges are the associations between vertices, edges 
  can represent possibility of transitions between states.

___
**Example:**
We have two states S+ and S- that refer to a quantum particle
with spin + or - 1/2 respectively. We can represent this as a
set V = {S+, S-}. Thanks to outer conditions the particle can
change its spin orientation, then this transition is represent
by the edge (S+, S-) for moving from S+ to S-. The other transition
is represented by the edge (S-, S+) for moving from S- to S+.
Finally the edge set is E = {(S+, S-), (S-, S+)}.

The final graph is a structure G = ({S+, S-}, {(S+, S-), (S-, S+)}) = (V, E).

(S-)  <------->  (S+)
___

Oriented graph is a graph that has directed edges, meaning
that each edge has the start and the end vertex. Between
two vertices we can have two edges, one for each direction
(but there is no need to have two edges). 

For purposes of this text we need no more.
