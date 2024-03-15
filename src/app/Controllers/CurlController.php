<?php

declare(strict_types=1);

namespace App\Controllers;

use App\services\EmailValidatorService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CurlController
{
    private EmailValidatorService $emailValidatorService;
    public function __construct()
    {
        $this->emailValidatorService = new EmailValidatorService();
    }

    /**
     * @throws GuzzleException
     */
    public function index(Request $request, Response $response, $args): Response{
        $this->emailValidatorService = new EmailValidatorService();
        $result = $this->emailValidatorService->verify(1);
        try {
            return Twig::fromRequest($request)->render($response, 'index.twig', array("response" => json_encode($result)));
        } catch (Exception $e) {
        }
    }

}