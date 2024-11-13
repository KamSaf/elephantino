<?php

namespace Elephantino\Http;

/**
 * Class containing functions for accessing request data
 */
class Request
{
    private array $_params;
    private array $_body;

    private function _sanitize(array $json): array
    {
        return array_map('htmlspecialchars', $json);
    }

    private function _getPostFiles(array $files): array
    {
        return array_map(fn($file) => $file['tmp_name'], $files);
    }

    public function __construct($params)
    {
        $this->_params = $params;
        $body = [];
        if (explode(';', $_SERVER['CONTENT_TYPE'])[0] == 'multipart/form-data') {
            $body = Request::_getPostFiles($_FILES);
        }
        if ($_SERVER['CONTENT_TYPE'] == 'text/json') {
            $body = Request::_sanitize(
                json_decode(
                    json: file_get_contents('php://input'),
                    associative: true
                )
            );
        }
        $this->_body = $body;
    }

    public function getParams(): array
    {
        return $this->_params;
    }

    public function getBody(): array
    {
        return $this->_body;
    }
}
