<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Models\User;
use App\View;

class HomeController
{
    #[Get(routePath: '/')]
    public function index(): View
    {
        return View::make(
            'index',
            ['Author' => (new User())->findByEmail("sulaiman@sendajapan.com")]
        );
    }

    #[Post('/')]
    public function store()
    {
    }

    #[Put('/')]
    public function update()
    {
    }

}