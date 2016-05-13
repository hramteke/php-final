<?php

namespace Controller;

use lib\View\View;

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }
}
