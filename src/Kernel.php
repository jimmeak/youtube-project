<?php

namespace Jimmeak\Youtube;

use Jimmeak\Youtube\Http\Response;

class Kernel
{
    public function run(): void
    {
        echo '<pre>';
        $response = new Response();
        echo $response;
    }
}