<?php


namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\Middlewares;
use App\Middleware\BarMiddleware;
use App\Middleware\BazMiddleware;
use App\Middleware\FooMiddleware;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * Class MiddlewareController
 * @package App\Controller
 * @AutoController()
 * @Middlewares({
 *     @Middleware(BarMiddleware::class),
 *     @Middleware(BazMiddleware::class),
 *     @Middleware(FooMiddleware::class)
 * })
 */
class MiddlewareController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $attribute = $request->getAttribute("foo");
        var_dump($attribute);
        return 'index';
    }
}