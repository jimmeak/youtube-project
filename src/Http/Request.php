<?php

namespace Jimmeak\Youtube\Http;

use Jimmeak\Youtube\Collection\Bag;

class Request
{
    private string $requestUri;
    private string $httpMethod;
    private string $queryString;

    public Bag $query;
    public Bag $request;
    public Bag $cookies;
    public Bag $server;

    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->queryString = $_SERVER['QUERY_STRING'];

        $this->query = Bag::new($_GET);
        $this->request = Bag::new($_POST);
        $this->cookies = Bag::new($_COOKIE);
        $this->server = Bag::new($_SERVER);
    }

    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    public function getPath(): string
    {
        return parse_url($this->requestUri, PHP_URL_PATH);
    }

    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }
}