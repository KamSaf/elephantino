<?php

namespace Elephantino\Traits;

use Elephantino\Core\UrlRoute;

trait RoutesTrait
{
    private array $_routes = [];

    public function getRoutes(): array
    {
        return $this->_routes;
    }

    public function get(string $path, callable $controller): void
    {
        array_push(
            $this->_routes,
            new UrlRoute(
                pathInfo: $path,
                controller: [
                    "GET" => $controller,
                ],
            )
        );
    }

    public function post(string $path, callable $controller): void
    {
        array_push(
            $this->_routes,
            new UrlRoute(
                pathInfo: $path,
                controller: [
                    "POST" => $controller,
                ],
            )
        );
    }
}
