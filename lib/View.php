<?php

namespace lib\View;

class View
{
    public function __construct()
    {
    }

    public function render($viewScript)
    {
        /** @noinspection PhpIncludeInspection */
        require($viewScript);
    }
}
