<?php

namespace Elephantino\Http;

/**
 * Class containing functions for accessing request data
 */
class Request
{
    private array $_params;
    private array $_postData;

    private function _sanitizeInput(array $json): array
    {
        return array_map("htmlspecialchars", $json);
    }

    public function __construct($params)
    {
        $this->_params = $params;
        // var_dump(file_get_contents('php://input'));
        var_dump($_FILES);
        $json = json_decode(
            json: file_get_contents('php://input'),
            associative: true
        );
        $this->_postData = $json ? Request::_sanitizeInput($json) : [];
    }

    public function getParams(): array
    {
        return $this->_params;
    }

    public function getBody(): array
    {
        return $this->_postData;
    }
}
