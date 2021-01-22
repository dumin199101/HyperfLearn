<?php


namespace App\Service;


use App\Event\SendEmailEvent;
use App\Event\UserRegisterEvent;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;

class UserService
{
    /**
     * @var EventDispatcherInterface
     * @Inject()
     */
    private $eventDispatcher;

    public function getInfoById($id){
        return [
            'username' => 'lieyan',
            'age' => 22
        ];
    }

    public function register()
    {
        $id = rand(1,9999);
        //触发用户注册事件
        $this->eventDispatcher->dispatch(new UserRegisterEvent($id));
        $this->eventDispatcher->dispatch(new SendEmailEvent($id));
        return $id;

    }
}