<?php

class CarComment {
    private $comment;
    private $userEmail;

    public function __construct($comment, $userEmail)
    {
        $this->comment = $comment;
        $this->userEmail = $userEmail;
    }

    public function getComment():string
    {
        return $this->comment;
    }

    public function setComment(string $title)
    {
        $this->comment = $comment;
    }

    public function getUserEmail():string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $description)
    {
        $this->userEmail = $userEmail;
    }

}