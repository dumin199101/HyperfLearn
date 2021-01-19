<?php


namespace App\Controller;


use App\Service\StudentService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class Student2Controller
 * @package App\Controller
 * @AutoController()
 */
class Student2Controller extends AbstractController
{
    /**
     * @var StudentService
     * @Inject()
     */
    private $student2;

    public function index()
    {
        return $this->student2->study();
    }
}