<?php

declare(strict_types=1);

namespace App\controllers;


use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS'],
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
            );

            $dbQuery = "SELECT * from users where email = ?";

            try {
                $db->beginTransaction();

                $preparedStatement = $db->prepare($dbQuery);
                $result = $preparedStatement->execute(["sulaiman@sendajapan.com"]);

                $db->commit();
            } catch (\Exception $e) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }

                echo $e->getMessage();
            }

            if ($result) {
                foreach ($preparedStatement->fetchAll() as $user) {
                    echo "<pre>";
                    var_dump($user);
                    echo "<pre>";
                }
            }
        } catch (PDOException $ex) {
            throw new PDOException($ex->getMessage(), $ex->getCode());
        }

        return View::make('index', ['Author' => 'SULAIMAN']);
    }

}