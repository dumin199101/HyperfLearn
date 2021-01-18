<?php


namespace App\Service;


class WorkerImpl implements Worker
{
    public function work()
    {
        // TODO: Implement work() method.
        var_dump("生产产品");
    }

    public function study()
    {
        // TODO: Implement study() method.
        var_dump("学习技能");
    }

    public function sleep()
    {
        // TODO: Implement sleep() method.
        var_dump("养精蓄锐");
    }

}