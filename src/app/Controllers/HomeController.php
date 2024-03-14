<?php

declare(strict_types=1);

namespace App\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Attributes\Post;
use App\Attributes\Put;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function index(Request $request, Response $response, $args): Response
    {
        return Twig::fromRequest($request)->render($response, 'index.twig', array('name' => 'SULAIMAN'));
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