<?php

declare(strict_types=1);

namespace App\Controllers;


use App\services\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{
    public function __construct(protected readonly Twig $twig, protected UserService $userService)
    {
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function index(Request $request, Response $response, $args): Response
    {
        $name = $this->userService->getUser('sulaiman@sendajapan.com')[0]['fullName'];
        return $this->twig->render($response, 'index.twig', array('name' => $name));
    }
}