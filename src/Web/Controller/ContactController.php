<?php

namespace Jimmeak\Youtube\Web\Controller;

use Jimmeak\Youtube\Http\Response;
use Jimmeak\Youtube\Routing\Route;

class ContactController
{
    #[Route('/kontakt', 'contact')]
    public function contact(): Response
    {
        return new Response('Hello from contact');
    }
}