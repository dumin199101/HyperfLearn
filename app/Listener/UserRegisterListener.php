<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\SendEmailEvent;
use App\Event\UserRegisterEvent;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @Listener(priority=1)
 */
class UserRegisterListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            UserRegisterEvent::class,
            SendEmailEvent::class
        ];
    }

    /**
     * @param object $event
     */
    public function process(object $event)
    {
       if($event instanceof UserRegisterEvent){
           echo "用户注册成功,注册用户ID为：" . $event->id . PHP_EOL;
       }elseif ($event instanceof SendEmailEvent){
           echo "发送注册邮件成功,注册用户ID为：" . $event->id . PHP_EOL;
       }
    }
}
