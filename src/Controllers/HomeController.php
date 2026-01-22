<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\UserService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Views\PhpRenderer;

class HomeController extends Controller {
    public function show(Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'home.php');
    }
}