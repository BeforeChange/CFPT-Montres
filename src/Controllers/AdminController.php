<?php

namespace Cfpt\Montres\Controllers;

use Cfpt\Montres\Services\BrandService;
use Cfpt\Montres\Services\VersionService;
use Cfpt\Montres\Services\WatchService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Exceptions\NestedValidationException;
use Slim\Views\PhpRenderer;
use Respect\Validation\Validator as v;

class AdminController extends Controller {
    protected VersionService $versionService;
    protected BrandService $brandService;
    protected WatchService $watchService;

    public function __construct(PhpRenderer $renderer, VersionService $versionService, BrandService $brandService, WatchService $watchService) {
        parent::__construct($renderer);
        $this->versionService = $versionService;
        $this->brandService = $brandService;
        $this->watchService = $watchService;
    }

    public function logs(Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'admin/logs.php');
    }

    public function add(Request $request, Response $response, array $args) {
        $versions = $this->versionService->all();
        $brands = $this->brandService->all();

        return $this->renderer->render($response, 'admin/add.php', [
            'versions' => $versions,
            'brands' => $brands
        ]);
    }

    public function store(Request $request, Response $response, array $args) {
        $data = $request->getParsedBody();

        $uploadedFiles = $request->getUploadedFiles();
        $image = $uploadedFiles['image'] ?? null;

        if($image && $image->getError() === UPLOAD_ERR_OK) {
            $contents = $image->getStream()->getContents();
            $data['image'] = base64_encode($contents);
            $data['mime'] = $image->getClientMediaType();
        } else {
            $data['image'] = null;
            $data['mime'] = null;
        }

        $validator = v::key('name', v::stringType()->notEmpty()->length(1, 50))
            ->key('id_version', v::intVal()->positive())
            ->key('price', v::numericVal()->positive())
            ->key('image', v::notEmpty())
            ->key('mime', v::oneOf(v::equals('image/png'), v::equals('image/jpeg')));

        try {
            $validator->assert($data);
        } catch (NestedValidationException $e) {
            $errors = [];
            return $this->renderer->render($response, 'admin/add.php', [
                'errors' => $errors,
                'old' => $data
            ]);
        }

        $this->watchService->add($data);

        return $response
            ->withHeader('Location', '/')
            ->withStatus(302);
    }
}