<?php

namespace Jimmeak\Youtube;

use Jimmeak\Youtube\Http\Request;

class Kernel
{
    public function run(): void
    {
        $request = new Request();

        echo '<hr>';
        echo '<pre>';
        var_dump($request->query->all());

    }
}