<?php

namespace Jimmeak\Youtube;

use Jimmeak\Youtube\Http\Request;
use Jimmeak\Youtube\Routing\RouterProvider;

class Kernel
{
    public function run(): void
    {
        $request = new Request();

        $routerProvider = new RouterProvider();
        $routerProvider->findRoutes();
        $router = $routerProvider->getRouter();

        $route = $router->match($request->getPath(), $request->getHttpMethod());

        $controllerPath = $route->getController();

        echo '<pre>';
        $controller = explode('::', $controllerPath);
        $controllerClass = new $controller[0]();
        $response = $controllerClass->{$controller[1]}();

        echo $response;

        echo '<hr>';
        echo '<pre>';
//        print_r($router);

    }
}