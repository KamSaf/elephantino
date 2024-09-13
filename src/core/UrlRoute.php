<?php

namespace Elephantino\Core;

use ReflectionFunction;
use Exception;
use Elephantino\Http\Request;
use Elephantino\Http\Response;


class UrlRoute
{
    private string $_pathInfo;
    private string $_urlReg;
    private $_controller;

    public function __construct(
        string $pathInfo,
        array $controller,
    ) {
        $this->_pathInfo = $pathInfo;
        $this->_urlReg = UrlRoute::addrToReg(address: $pathInfo);
        $this->_controller = $controller;
    }

    /**
     * Verify whether given URL address corresponds
     * to the objects regex address pattern
     */
    public function verifyUrl(string $url): bool
    {
        return preg_match($this->_urlReg, $url);
    }

    /**
     * Veryfying if used request HTTP method is allowed in this route
     */
    public function verifyMethod(string $method): bool
    {
        return array_key_exists($method, $this->_controller);
    }

    /**
     * Function calling controller assigned to the object
     */
    public function callController(string $method, bool $debug): void
    {
        $contrRefl = new ReflectionFunction($this->_controller[$method]);
        $params = in_array(
            needle: 'req',
            haystack: array_map(
                fn($el): string =>  $el->name,
                $contrRefl->getParameters()
            )
        ) ? new Request(UrlRoute::_getUrlParams($this->_pathInfo)) : null;
        try {
            call_user_func($this->_controller[$method], $params);
            exit;
        } catch (Exception $e) {
            if ($debug) {
                Response::error($e->getMessage());
            }
            throw new Exception(
                message: $e->getMessage(),
            );
        }
    }

    /**
     * Function getting splitted URL
     */
    public static function getUrl(): array
    {
        $url = $_SERVER['REQUEST_URI'];
        return explode('/', substr($url, 1, strlen($url)));
    }

    /**
     * Function getting URL parameters
     */
    private static function _getUrlParams(string $path): array
    {
        $url = UrlRoute::getUrl();
        $urlPattern = explode('/', substr($path, 1, strlen($path)));
        if (count($urlPattern) != count($url)) {
            return [];
        }
        $params = [];
        for ($i = 0; $i < count($urlPattern); $i++) {
            if ($urlPattern[$i][0] === ':') {
                $params[substr(
                    $urlPattern[$i],
                    1,
                    strlen($urlPattern[$i])
                )] = $url[$i];
            }
        }
        return $params;
    }

    /**
     * Function parsing URL address to regular expression
     */
    public static function addrToReg(string $address): string
    {
        $reg = explode('/', $address);
        for ($i = 0; $i < count($reg); $i++) {
            $reg[$i] = $reg[$i][0] == ':' ? '([0-9a-zA-Z\-]+)' : $reg[$i];
        }
        return "/^" . implode(separator: '\/', array: $reg) . '(?:\/)?$/';
    }
}
