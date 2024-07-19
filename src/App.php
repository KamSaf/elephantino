<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require "{$rootPath}/src/traits/RoutesTrait.php";

class App
{
    use RoutesTrait;
    private string $_header;
    private static array $_availableHeaders = ['json'];

    public function getHeader(): string
    {
        return $this->_header;
    }

    public function setHeader(string $header = 'json'): void
    {
        if (!in_array($header, App::$_availableHeaders)) {
            throw new \InvalidArgumentException('This header type is not supported');
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/{$header}");
    }
    public function run(): void
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->_routes as $route) {
            if ($route->verifyUrl(url: $url)) {
                if (!$route->verifyMethod(method: $method)) {
                    UrlRoute::logError(message: 'Method not allowed.', code: 405);
                }
                $route->callController(method: $method);
            }
        }
        UrlRoute::logError(message: 'Endpoint not found.', code: 404);
    }
}
