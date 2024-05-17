<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . '/src/config/Components.php';
require_once $rootPath . '/src/config/Database.php';
require_once $rootPath . '/src/core/utils/Utils.php';
require_once $rootPath . '/src/core/UrlRoute.php';


class App
{
    private static array $_appRoutes = []; 
    private array $_componentsPaths = COMPONENTS_PATHS;
    private array $_components = COMPONENTS;

    public function __construct()
    {
        $this->_loadComponents();
    }

    public static function registerRoutes(array $routes): void
    {
        App::$_appRoutes = array_merge(App::$_appRoutes, $routes);
    }

    private function _loadComponents(): void
    {
        global $rootPath;
        foreach ($this->_components as $compType => $compFiles) {
            foreach ($compFiles as $compFile) {
                include_once $rootPath . $this->_componentsPaths[$compType] . $compFile;
            }
        }
    }

    public function setHeader(): void
    {
        header('Content-Type: application/json');
    }

    public function run(): void
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach (App::$_appRoutes as $route) {
            if ($route->verifyUrl(url: $url)) {
                if (!$route->verifyMethod(method: $method)) {
                    UrlRoute::error(message: 'Method not allowed.', code: 405);
                }
                $route->callController(method: $method);
            }
        }
        UrlRoute::error(message: 'Endpoint not found.', code: 404);
    }
}