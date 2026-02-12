<?php

namespace Cfpt\Montres\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Log\LoggerInterface;

class AccessLoggerMiddleware implements MiddlewareInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $request->getUri()->getPath();
        $method = $request->getMethod();
        $uri = (string)$request->getUri();
        $ip = $request->getServerParams()['REMOTE_ADDR'] ?? 'unknown';
        $date = date('Y-m-d H:i:s');

        if (!str_contains($path, '/assets/') && !str_contains($path, 'favicon.ico')) {
            $msg = sprintf(
                "%s %s (path: %s, ip: %s)",
                $method,
                $uri,
                $path,
                $ip
            );

            $this->logger->info($msg);
        }

        return $handler->handle($request);
    }
}
