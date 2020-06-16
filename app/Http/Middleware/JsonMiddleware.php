<?php

namespace App\Http\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class JsonMiddleware
 * @package App\Http\Middleware
 * @Bean()
 */
class JsonMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        return $response->withAddedHeader('Content-Type', 'application/json');
    }
}
