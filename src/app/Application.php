<?php

declare(strict_types=1);

namespace App;

use App\Controllers\HomeController;
use App\Exception\RouteNotFoundException;
use ReflectionException;

class Application
{
    private static DB $db;

    /**
     * @param Router $router
     * @param array $request
     * @param Config $config
     */
    public function __construct(
        protected Router $router,
        protected array $request,
        protected Config $config
    ) {
        static::$db = new DB($this->config->db);
        try {
            $router->registerRoutesFromControllerAttributes([
                HomeController::class
            ]);
        } catch (ReflectionException $e) {
        }
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                strtolower($this->request['method'])
            );
        } catch (RouteNotFoundException $exception) {
            http_response_code(404);
            echo View::make('error/404', $exception->getTrace());
        }
    }
}