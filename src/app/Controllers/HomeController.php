<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Models\User;
use App\View;
use PDOException;

class HomeController
{
    #[Get(routePath:'/')]
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

    #[Post('/')]
    public function store(){

    }

    #[Put('/')]
    public function update(){

    }

}