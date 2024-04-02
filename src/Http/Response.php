<?php

namespace Jimmeak\Youtube\Http;

class Response
{
    public function __toString(): string
    {
        return 'HTTP/1.1 200 OK' . PHP_EOL . 'Content-Type: text/html; charset=utf-8' . PHP_EOL . PHP_EOL . 'Hello World!';
    }
}