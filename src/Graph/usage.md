# Usage of Graph

Node (V1): Data from Apache  
Node (V2): Request Object  
Node (V3): Response Object  
Node (V4): HTTP Response  
Node (V5): HTTP Response sent  

Edge (Parse Request): (V1, V2)  
Edge (Controller Action): (V2, V3)  
Edge (Print Response): (V3, V4)  
Edge (Send Response): (V4, V5)  

