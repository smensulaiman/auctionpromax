<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;
        return $this;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestUri): mixed
    {
        $route = explode("?", $requestUri)[0];
        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $dynamicClassObject = new $class();

                if (method_exists($dynamicClassObject, $method)) {
                    return call_user_func_array([$dynamicClassObject, $method], []);
                }
            }
        }

        throw new RouteNotFoundException();
    }

}