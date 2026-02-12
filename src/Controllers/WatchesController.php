<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\BrandService;
use Cfpt\Montres\Services\VersionService;
use Cfpt\Montres\Services\WatchService;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class WatchesController extends Controller {
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
        $params = $request->getQueryParams();

        $watches = $this->watchService->all($params);
        $brands = $this->brandService->all();
        $versions = $this->versionService->all();

        return $this->renderer->render($response, 'list.php', [
            'watches' => $watches,
            'brands' => $brands,
            'versions' => $versions
        ]);
    }

    public function showWatch(Request $request, Response $response, array $args) {
        $id = $args['id'];

        $watch = $this->watchService->find($id);
        $version = $this->versionService->find($watch->id_version);
        $brand = $this->brandService->find($version->id_brand);

        return $this->renderer->render($response, 'watch.php', [
            'watch' => $watch,
            'version' => $version,
            'brand' => $brand
        ]);
    }
}