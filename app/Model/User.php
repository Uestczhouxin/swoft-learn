<?php


namespace App\Model;


class User
{
    private $userid;

    public function __construct($userid)
    {
        $this->setUserid($userid);
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid): User
    {
        $this->userid = $userid;
        return $this;
    }
}
