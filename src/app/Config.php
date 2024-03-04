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
            'db' => [
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
                'host' => $env['DB_HOST'],
                'database' => $env['DB_NAME'],
                'user' => $env['DB_USER'],
                'pass' => $env['DB_PASS']
            ],
        ];
    }

    public function __get(string $name)
    {
        // TODO: Implement __get() method.
        return $this->config[$name] ?? [];
    }

}