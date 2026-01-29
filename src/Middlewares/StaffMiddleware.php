<?php

namespace Cfpt\Montres\Middlewares;

use Cfpt\Montres\Services\RoleService;
use Cfpt\Montres\Services\UserService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response as SlimResponse;

class StaffMiddleware implements MiddlewareInterface
{
    private UserService $userService;
    private RoleService $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }
    public function process(Request $request, RequestHandlerInterface $handler): Response
    {

        $user = $this->userService->getCurrentUser();
        $result = $this->roleService->isStaff($user->id_role);

        if(!$result) {
            $response = new SlimResponse();
            return $response
                ->withHeader('Location', '/')
                ->withStatus(302);
        }

        return $handler->handle($request);
    }
}
