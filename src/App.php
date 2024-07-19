<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once "{$rootPath}/src/traits/RoutesTrait.php";
require_once "{$rootPath}/src/utils/Response.php";

class App
{
    use RoutesTrait;
    public function run(): void
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->_routes as $route) {
            if ($route->verifyUrl(url: $url)) {
                if (!$route->verifyMethod(method: $method)) {
                    Response::json(
                        body: ["message" => 'Method not allowed.'], code: 405
                    );
                }
                $route->callController(method: $method);
            }
        }
        UrlRoute::logError(message: 'Endpoint not found.', code: 404);
    }
}
