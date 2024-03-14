<?php

namespace App;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

/**
 * @mixin Connection
 */
class DB
{
    private Connection $connection;

    /**
     * @param array $dbConfig
     */
    public function __construct(array $dbConfig)
    {
        $this->connection = DriverManager::getConnection($dbConfig);
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement __call() method.
        return call_user_func_array([$this->connection, $name], $arguments);
    }

}