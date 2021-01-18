<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get("/hello-hyperf", function () {
    return 'Hello,Hyperf';
});

//Router::get("/hello-hyperf","App\Controller\IndexController::hello");
//Router::get("/hello-hyperf","App\Controller\IndexController@hello");
//Router::get("/hello",[\App\Controller\IndexController::class,'hello']);

//Router::get("/router/index/{id}","\App\Controller\RouterController::index");
//Router::get("/router/index2/{id}","\App\Controller\RouterController::index2");