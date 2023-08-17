<?php

interface UserAccess
{
    public function validateUser($user, $password);

    public function userLogIn($user, $password, $token);
}