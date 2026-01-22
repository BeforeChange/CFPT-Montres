<?php

namespace Cfpt\Montres\Controllers;

use Slim\Views\PhpRenderer;

abstract class Controller {
    protected PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer) {
        $this->renderer = $renderer;
    }
}