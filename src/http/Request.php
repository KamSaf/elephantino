<?php

namespace Elephantino\Http;

/**
 * Class containing functions for accessing request data
 */
class Request
{
    private array $_params;

    public function __construct($params)
    {
        $this->_params = $params;
    }

    public function getParams(): array
    {
        return $this->_params;
    }
}
