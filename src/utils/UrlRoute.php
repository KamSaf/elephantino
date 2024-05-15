<?php

class UrlRoute
{
    private string $_urlReg;
    private array $_httpMethods;
    private $_controller;


    public function __construct(
        string $urlReg,
        callable $controller,
        array $httpMethods
    ) {
        $this->_urlReg = $urlReg;
        $this->_httpMethods = $httpMethods;
        $this->_controller = $controller;
    }

    /**
     * Verify whether given URL address corresponds
     * to the objects regex address pattern
     */
    public function verifyUrl(string $url): bool
    {
        if (!preg_match($this->_urlReg, $url)) {
            return false;
        }
        return true;
    }

    /**
     * Veryfying if request HTTP method is allowed in this route
     */
    public function verifyMethod(string $method): bool
    {
        return in_array(needle: $method, haystack: $this->_httpMethods);
    }


    /**
     * Function calling assigned to the object
     */
    public function callController()
    {
        try {
            call_user_func(callback: $this->_controller);
        } catch (Exception $e) {
            throw new Exception(message: "Invalid callable function provided.", code: 404);
        }
    }
}
