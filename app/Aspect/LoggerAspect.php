<?php


namespace App\Aspect;

use App\Annotation\Bar;
use App\Service\WorkerImpl;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * Class LoggerAspect
 * AOP:通过动态代理，对方法进行增强，降低耦合性
 * @package App\Aspect
 * @Aspect()
 */
class LoggerAspect extends AbstractAspect
{
    //定义要切入的类跟方法
    public $classes = [
//        WorkerImpl::class
          //给某一个方法单独增强
          WorkerImpl::class . '::study'
    ];

    //切入注解
    public $annotations = [
       Bar::class
    ];


    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        // TODO: Implement process() method.
        //前置处理
        var_dump("进行权限认证");
        //手动调用业务逻辑方法
        $rs = $proceedingJoinPoint->process();
        //后置处理
        var_dump("Logger记录日志，进行日志分析");

        return $rs;

    }

}