<?php


namespace App\Event;


class SendEmailEvent
{
    public $id;

    /**
     * SendEmailEvent constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

}