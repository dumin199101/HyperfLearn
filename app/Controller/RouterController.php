<?php


namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * Class RouterController
 * @package App\Controller
 * @AutoController()
 */
class RouterController extends AbstractController
{
    //路由模块测试
    public function index(RequestInterface $request){
        $id = $request->route('id',1);
        var_dump("获取的id:" . $id);
    }

    public function index2($id)
    {
        var_dump("获取的id:" . $id);
    }

    public function index3(RequestInterface $request)
    {
        $id = $request->input('id', 1);
        var_dump("获取的id:".$id);
    }

}