<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\UserService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Views\PhpRenderer;

class AuthController extends Controller {
    protected UserService $userService;

    public function __construct(PhpRenderer $renderer, UserService $userService) {
        parent::__construct($renderer);
        $this->userService = $userService;
    }

    public function showLogin(Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'auth/login.php');
    }

    public function login(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();

        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
        $password = $data['password'] ?? null;

        $errors = [];

        if(!$email) {
            $errors['email'] = 'Invalid email address.';
        }

        if(!$password) {
            $errors['password'] = 'Password is required.';
        }

        if($errors) {
            return $this->renderer->render($response, 'auth/login.php', [
                'errors' => $errors,
                'data' => $data
            ]);
        }

        $result = $this->userService->login($email, $password);

        if(!$result) {
            $errors['general'] = 'Invalid email or password.';
            return $this->renderer->render($response, 'auth/login.php', [
                'errors' => $errors,
                'data' => $data
            ]);
        }

        return $response->withHeader('Location', '/')->withStatus(302);
    }

    public function logout(Request $request, Response $response, array $args) {
        $result = $this->userService->logout();

        if(!$result) {
            throw new HttpInternalServerErrorException($request, "Une erreur interne est survenu lors de la déconnexion.");
        }

        return $response->withHeader('Location', '/login')->withStatus(302);
    }

    public function showRegister(Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'auth/register.php');
    }

    public function register(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();

        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
        $password = $data['password'] ?? null;
        $confirmPassword = $data['confirm_password'] ?? null;

        $errors = [];

        if (!$email) {
            $errors['email'] = 'Invalid email address.';
        }

        if (!$password) {
            $errors['password'] = 'Password is required.';
        }

        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = 'Passwords do not match.';
        }

        if ($errors) {
            return $this->renderer->render($response, 'auth/register.php', [
                'errors' => $errors,
                'data' => $data
            ]);
        }

        $result = $this->userService->register($data);

        if (!$result) {
            throw new HttpInternalServerErrorException($request, 'Registration failed. Please try again.');
        }

        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }

    public function profil(Request $request, Response $response, array $args) {
        $user = $this->userService->getCurrentUser();
        return $this->renderer->render($response, 'auth/profil.php', [
            'user' => $user
        ]);
    }
}