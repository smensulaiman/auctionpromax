<?php

declare(strict_types=1);


namespace App\Middleware;

use App\Exception\ValidationException;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
    public function __construct(private ResponseFactoryInterface $responseFactory)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (ValidationException $exception) {
            $response = $this->responseFactory->createResponse();
            $referer = $request->getServerParams()['HTTP_REFERER'];

            $_SESSION['errors'] = $exception->errors;
            $_SESSION['old'] = $request->getParsedBody();

            return $response->withHeader('Location', $referer)->withStatus(302);
        }
    }
}