<?php


namespace App\Annotation;
use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * Class Bar
 * @package App\Annotation
 * @Annotation()
 * @Target({"METHOD","CLASS"})
 */
class Bar extends AbstractAnnotation
{
   public $name;
   public $age;
}