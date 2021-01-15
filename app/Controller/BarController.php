<?php


namespace App\Controller;

use App\Annotation\Bar;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class BarController
 * @package App\Controller
 * @AutoController()
 * @Bar(name="lisi",age="23")
 */
class BarController extends AbstractController
{

    //利用注解收集器，收集注解数据
    public function index()
    {
        /**
          array(1) {
            ["App\Controller\BarController"]=>
                object(App\Annotation\Bar)#1313 (2) {
                    ["name"]=>
                    string(4) "lisi"
                    ["age"]=>
                    string(2) "23"
                }
            }
         */
        $classesByAnnotation = AnnotationCollector::getClassesByAnnotation(Bar::class);
        $name = $classesByAnnotation[BarController::class]->name;
        $age = $classesByAnnotation[BarController::class]->age;
        var_dump($name);
        var_dump($age);
        return "getClassesByAnnotation";
    }

    /**
     * @Bar(name="zhangsan",age="30")
     */
    public function index2(){
        /**
         * array(1) {
            [0]=>
                array(3) {
                    ["class"]=>
                    string(28) "App\Controller\BarController"
                    ["method"]=>
                    string(6) "index2"
                    ["annotation"]=>
                    object(App\Annotation\Bar)#77304 (2) {
                    ["name"]=>
                    string(8) "zhangsan"
                    ["age"]=>
                    string(2) "30"
                    }
                }
            }

         *
         */
        $methodsByAnnotation = AnnotationCollector::getMethodsByAnnotation(Bar::class);
        var_dump($methodsByAnnotation);
        return "getMethodsByAnnotation";
    }

    public function index3()
    {
        /**
         * object(App\Annotation\Bar)#1305 (2) {
                ["name"]=>
                string(4) "lisi"
                ["age"]=>
                string(2) "23"
            }
         */
        $result = AnnotationCollector::getClassAnnotation(BarController::class, Bar::class);
        var_dump($result);
        return "getClassAnnotation";
    }

    /**
     * @return string
         array(1) {
            ["App\Annotation\Bar"]=>
            object(App\Annotation\Bar)#51861 (2) {
            ["name"]=>
            string(8) "zhangsan"
            ["age"]=>
            string(2) "30"
            }
        }

     */
    public function index4()
    {
        $methodAnnotation = AnnotationCollector::getClassMethodAnnotation(BarController::class, 'index2');
        var_dump($methodAnnotation[Bar::class]->name);
        var_dump($methodAnnotation[Bar::class]->age);
        return "getMethodAnnotation";
    }
}