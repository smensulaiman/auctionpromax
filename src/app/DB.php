<?php

namespace App;

use PDO;

/**
 * @mixin PDO
 */
class DB
{
    private PDO $pdo;

    /**
     * @param array $dbConfig
     */
    public function __construct(array $dbConfig)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->pdo = new PDO(
                $dbConfig['driver'] . ':host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['database'],
                $dbConfig['user'],
                $dbConfig['pass'],
                $dbConfig['options'] ?? $defaultOptions
            );
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), $exception->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement __call() method.
        return call_user_func_array([$this->pdo, $name], $arguments);
    }

}