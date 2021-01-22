<?php


namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class EventController
 * @package App\Controller
 * @AutoController()
 */
class EventController extends AbstractController
{
    /**
     * @var UserService
     * @Inject()
     */
    private $userService;

    public function index()
    {
        return $this->userService->register();
    }
}