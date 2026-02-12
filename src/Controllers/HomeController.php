<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\BrandService;
use Cfpt\Montres\Services\UserService;
use Cfpt\Montres\Services\VersionService;
use Cfpt\Montres\Services\WatchService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\Views\PhpRenderer;

class HomeController extends Controller {
    protected VersionService $versionService;
    protected BrandService $brandService;
    protected WatchService $watchService;

    public function __construct(PhpRenderer $renderer, VersionService $versionService, BrandService $brandService, WatchService $watchService) {
        parent::__construct($renderer);
        $this->versionService = $versionService;
        $this->brandService = $brandService;
        $this->watchService = $watchService;
    }

    public function show(Request $request, Response $response, array $args) {
        $watches = $this->watchService->all();
        $brands = $this->brandService->all();
        $versions = $this->versionService->all();
        
        return $this->renderer->render($response, 'home.php', [
            'watches' => $watches,
            'brands' => $brands,
            'versions' => $versions
        ]);
    }
}