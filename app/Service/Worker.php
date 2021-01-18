<?php


namespace App\Service;


interface Worker
{
    /**
     * @return mixed
     * 工作
     */
    public function work();

    /**
     * @return mixed
     * 学习
     */
    public function study();

    /**
     * @return mixed
     * 休息
     */
    public function sleep();
}