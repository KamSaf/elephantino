<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once "{$rootPath}/src/traits/RoutesTrait.php";
require_once "{$rootPath}/src/utils/Response.php";
require_once "{$rootPath}/src/Router.php";

class App
{
    use RoutesTrait;
    private array $_appRoutes = ['root' => null];

    private function _findRoute(
        string $url,
        string $method,
        array $routes,
        bool $debug
    ): void {
        foreach ($routes as $route) {
            if (!$route->verifyUrl(url: $url)) {
                continue;
            }
            if (!$route->verifyMethod(method: $method)) {
                Response::error(
                    message: 'Method not allowed.',
                    code: 405
                );
            }
            $route->callController(method: $method, debug: $debug);
        }
        Response::error(message: 'Endpoint not found.', code: 404);
    }

    public function run(bool $debug = false): void
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $routeKey = explode(separator: '/', string: $url)[1];
        if (array_key_exists(key: $routeKey, array: $this->_appRoutes)) {
            $routes = $this->_appRoutes[$routeKey];
            $url = substr(string: $url, offset: strlen($routeKey) + 2) . '/';
        } else {
            $routes = $this->_routes;
        }
        $this->_findRoute(url: $url, method: $method, routes: $routes, debug: $debug);
    }

    public function include(string $key, Router $router): void
    {
        $this->_appRoutes[$key] = $router->getRoutes();
    }
}
