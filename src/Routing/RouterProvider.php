<?php

namespace Jimmeak\Youtube\Routing;

use ReflectionClass;

class RouterProvider
{
    private const string BASE_DIR = __DIR__ . '/../Web/Controller/';

    // Associative array Class::method => Route
    private array $routes = [];

    public function getRouter(): Router
    {
        $router = new Router();

        foreach ($this->routes as $controller => $route) {
            $route->setController($controller);
            $router->add($route);
        }

        return $router;
    }

    public function findRoutes(): void
    {
        $phpFiles = glob(self::BASE_DIR . '*.php');

        foreach ($phpFiles as $phpFile) {
            require_once $phpFile;
        }

        echo '<pre>';
        foreach (get_declared_classes() as $class) {
            if (str_contains($class, 'Controller')) {
                $reflectionClass = new ReflectionClass($class);
                $methods = $reflectionClass->getMethods();
                foreach ($methods as $method) {
                    $attributes = $method->getAttributes();
                    foreach ($attributes as $attribute) {
                        if ($attribute->getName() !== Route::class) {
                            continue;
                        }

                        $this->routes[$reflectionClass->getName() . '::' . $method->getName()] = $attribute->newInstance();
                    }
                }

            }
        }

        echo '<pre>';
    }
}
