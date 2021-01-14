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
namespace App\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Controller()
 */
class UserController extends AbstractController
{
    /**
     * @RequestMapping(path="index2",methods={"get","post"})
     */
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'wangli');
        $method = $request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * 处理HTTP请求,获取请求参数
     * @GetMapping(path="/hi")
     */
    public function hi(RequestInterface $request)
    {
        return $request->input("id",1);
    }

}
