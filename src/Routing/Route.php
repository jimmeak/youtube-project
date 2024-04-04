<?php

namespace Jimmeak\Youtube\Routing;

use Attribute;

#[Attribute]
final readonly class Route
{
    private string $controller;

    public function __construct(
        private string $url,
        private string $name,
        private array $enabledMethods = ['GET'],
    ) {
    }

    public function match(string $path): bool
    {
        // Possible given url: /videos/1 or /videos/1/?page=2
        // Possible router url: videos/1 or /videos/1/

        $path = trim($path, '/');
        $routeUrl = trim($this->url, '/');

        return $path === $routeUrl;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEnabledMethods(): array
    {
        return $this->enabledMethods;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }
}