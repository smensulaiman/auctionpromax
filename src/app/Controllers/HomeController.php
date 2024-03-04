<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Models\User;
use App\View;
use PDOException;

class HomeController
{
    public function index(): View
    {
        try {
            return View::make(
                'index',
                ['Author' => (new User())->findByEmail("sulaiman@sendajapan.com")]
            );
        } catch (PDOException $ex) {
            throw new PDOException($ex->getMessage(), $ex->getCode());
        }
    }

}