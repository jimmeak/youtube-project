<?php

namespace Jimmeak\Youtube\Web\Controller;

use Jimmeak\Youtube\Http\Response;
use Jimmeak\Youtube\Routing\Route;

class HomepageController
{
    #[Route('/', 'homepage')]
    public function homepage(): Response
    {
        return new Response('Hello from homepage');
    }
}