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
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;


/**
 * Class UserController
 * @package App\Controller
 * @AutoController()
 */
class User2Controller extends AbstractController
{
    /**
     * 依赖注入:
     *    2.通过注解注入
     *
     */


    /**
     * @var UserService
     * @Inject()
     */
    private $userService;

    public function info()
    {
        //方式1：通过构造方法注入
        return $this->userService->getInfoById(1);
    }





}
