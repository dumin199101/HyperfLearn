<?php


namespace App\Event;


class UserRegisterEvent
{
    public $id;

    /**
     * UserRegisterEvent constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

}