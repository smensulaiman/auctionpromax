<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;
use ReflectionClass;

class Router
{
    private array $routes;

    /**
     * @throws \ReflectionException
     */
    public function registerRoutesFromControllerAttributes(array $controllers): void
    {
        foreach ($controllers as $controller){
            $reflectionController = new ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method){
                $attributes = $method->getAttributes();

                foreach ($attributes as $attribute){
                    $route = $attribute->newInstance();
                    $this->register($route->method, $route->routePath, [$controller, $method->getName()]);
                }
            }
        }
    }

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function routes(): array{
        return $this->routes;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestUri, string $requestMethod): mixed
    {
        $route = explode("?", $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

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