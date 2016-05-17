<?php

namespace controller;

/** @noinspection PhpIncludeInspection */
require_once('lib/View.php');

use lib\View\View;

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }
}
