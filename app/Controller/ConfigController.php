<?php


namespace App\Controller;

use Hyperf\Config\Annotation\Value;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class CofigController
 * @package App\Controller
 * @AutoController()
 */
class ConfigController extends AbstractController
{
    /**
     * @var string
     * @Value("app_name")
     */
    private $app_name;

    /**
     * @var ConfigInterface
     * @Inject()
     */
    private $config;

    public function index()
    {
        //通过config函数获取
        $app_name = config("app_name","application");
        var_dump($app_name);
    }

    public function index2()
    {
        $app_name = $this->config->get("app_name","application");
        var_dump($app_name);
    }

    public function index3()
    {
        var_dump($this->app_name);
    }
}