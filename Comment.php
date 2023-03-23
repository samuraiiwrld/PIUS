<?php

namespace u8202112;

use u8202112\User;

require './vendor/autoload.php';


class Comment{
    public function __construct(public User $user, public string $comment)
    {
    }

    public function getUser(): User
    {
        return $this -> user;
    }
    public function getComment(): string
    {
        return $this -> comment;
    }
}


