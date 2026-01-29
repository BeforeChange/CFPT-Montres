<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\UserService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Views\PhpRenderer;

class ErrorController extends Controller {
    public function show(Request $request, Response $response, array $args) {
        $code = (int)($args['code'] ?? 500);

        $message = match($code) {
            404 => "Page introuvable",
            500 => "Erreur interne du serveur",
            403 => "Accès refusé",
            default => "Erreur inconnue",
        };

        return $this->renderer->render($response, 'error/error.php', [
            'code' => $code,
            'message' => $message
        ]);
    }
}