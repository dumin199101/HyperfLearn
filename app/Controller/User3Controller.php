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

use App\Service\UserService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;


/**
 * Class UserController
 * @package App\Controller
 * @Controller()
 */
class User3Controller extends AbstractController
{
    /**
     * 依赖注入
     *    1.通过构造方法注入
     *
     *
     */

    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @GetMapping(path="hi")
     */
    public function info()
    {
        //方式1：通过构造方法注入
        return $this->userService->getInfoById(1);
    }





}
