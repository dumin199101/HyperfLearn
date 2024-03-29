<?php

declare(strict_types=1);

namespace App\Middleware;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class BarMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        echo '1';
        //对request进行改动
        $request = Context::override(ServerRequestInterface::class,function () use ($request) {
            return $request->withAttribute("foo","hello");
        });
        $response = $handler->handle($request);
        echo '4';
        //对response进行改动
        $body = $response->getBody()->getContents();
        return $response->withBody(new SwooleStream($body . ' middleware'));
    }
}