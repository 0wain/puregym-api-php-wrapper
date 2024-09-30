<?php

namespace Owainjones74\Puregym;


class PureGymClient
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

}