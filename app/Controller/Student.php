<?php


namespace App\Controller;

use App\Service\StudentServiceImpl;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class Student
 * @package App\Controller
 * @AutoController()
 */
class Student extends AbstractController
{
    /**
     * @var StudentServiceImpl
     * @Inject()
     */
    private $studentService;

    public function study(StudentServiceImpl $studentService)
    {
        return $this->studentService->study();
    }
}