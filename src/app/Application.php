<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;

class Application
{

    /**
     * @param Router $router
     */
    public function __construct(protected Router $router)
    {
    }

    /**
     * @throws RouteNotFoundException
     */
    public function run(): void
    {
        try {
            echo $this->router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
        } catch (RouteNotFoundException $exception) {
            http_response_code(404);
            echo View::make('error/404', $exception->getTrace());
        }
    }
}