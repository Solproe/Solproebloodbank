<?php

namespace App\Services;

require '../vendor/autoload.php';

interface RequestInterface {

    public function save();

    public function send();
}
