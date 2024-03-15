<?php

namespace App;

/**
 * @property array|mixed|null $db
 */
class Config
{
    protected array $config = [];

    /**
     * @param array $env
     */
    public function __construct(array $env)
    {
        $this->config = [
            'environment' => $env['APP_ENVIRONMENT'] ?? 'production',
            'db' => [
                'dbname' => $env['DB_NAME'],
                'user' => $env['DB_USER'],
                'password' => $env['DB_PASS'],
                'host' => $env['DB_HOST'],
                'driver' => $env['DB_DRIVER'] ?? 'pdo_mysql'
            ],
        ];
    }

    public function __get(string $name)
    {
        // TODO: Implement __get() method.
        return $this->config[$name] ?? [];
    }

}