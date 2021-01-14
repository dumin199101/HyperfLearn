<?php


namespace App\Service;


class StudentServiceImpl implements StudentService
{

    public function study()
    {
        return [
            "name"=>"lisi",
            "course"=>"西游记",
            "score" => 90
        ];
    }
}