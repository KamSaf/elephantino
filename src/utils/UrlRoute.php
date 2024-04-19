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
     * Verify whether given url address corresponds
     * to the objects regex address pattern
     */
    public function verifyUrl(string $url): bool
    {
        return false;
    }

    /**
     * Function calling assigned to the object
     */
    public function callController()
    {
        call_user_func(callback: $this->_controller);
    }
}
