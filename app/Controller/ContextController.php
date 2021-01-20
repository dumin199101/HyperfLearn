<?php


namespace App\Controller;


use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\Context;

/**
 * Class ContextController
 * @package App\Controller
 * @AutoController()
 * @property int $foo
 */
class ContextController extends AbstractController
{
    /*private $foo = 10;*/

    public function get()
    {
        return $this->foo;
    }

    public function set(RequestInterface $request)
    {
        $id = $request->input('id',1);
        $this->foo = $id;
        return $this->foo;
    }

    public function __get($value)
    {
        // TODO: Implement __get() method.
        return Context::get(__CLASS__ . ":" .  $value,1);
    }

    public function __set($name,$value)
    {
        // TODO: Implement __set() method.
        Context::set(__CLASS__ . ":"  . $name,$value);
    }


}