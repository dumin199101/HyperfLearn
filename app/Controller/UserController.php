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
use Hyperf\HttpServer\Annotation\RequestMapping;

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
    public function index()
    {
        $user = $this->request->input('user', 'wangli');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

}
