<?php


namespace App\Controller;

use App\Service\Worker;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class WorkerController
 * @package App\Controller
 * @AutoController()
 */
class WorkerController extends AbstractController
{
    /**
     * @var Worker
     * @Inject()
     */
    public $worker;

    public function index()
    {
        $this->worker->study();
        $this->worker->work();
        $this->worker->sleep();
    }
}