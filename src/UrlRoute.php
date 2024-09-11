<?php

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
    public function callController(string $method): void
    {
        try {
            call_user_func(callback: $this->_controller[$method]);
            exit;
        } catch (Exception $e) {
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
     * Function parsing URL address to regular expression
     */
    public static function addrToReg(string $address): string
    {
        $reg = explode('/', $address);
        for ($i = 0; $i < count($reg); $i++) {
            if (str_contains(haystack: $reg[$i], needle: '<string:')) {
                $reg[$i] = '([0-9a-zA-Z\-]+)';
            }
            if (str_contains(haystack: $reg[$i], needle: '<int:')) {
                $reg[$i] = "([0-9]+)";
            }
        }
        return "/^" . implode(separator: '\/', array: $reg) . "(?:\/)?$/";
    }
}
