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
        $this->pathInfo = $pathInfo;
        $this->_urlReg = addrToReg(address: $pathInfo);
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
        } catch (Exception $e) {
            throw new Exception(
                message: 'Invalid callable function provided.',
            );
        }
    }

    public static function error(string $message, int $code): void
    {
        echo json_encode(['code' => $code, 'detail' => $message]);
        exit;
    }

    public static function endpoints(): string
    {
        echo json_encode(
            [
                'code' => 200,
                'Available endpoints' => [
                    'GET' => [
                        '/cars/' => 'Fetch all cars from database',
                        '/cars/:id/' => 'Fetch car by id',
                        '/cars_by_make/:make/' => 'Fetch cars by Make',
                        '/cars_by_model/:model/' => 'Fetch cars by Model',
                        '/cars_by_color/:color/' => 'Fetch cars by Color',
                    ],
                    'POST' => [
                        '/cars/' => 'Save new car to the database',
                    ],
                    'PUT' => [
                        '/cars/:id/' => 'Override car data in database',
                    ],
                    'DELETE' => [
                        '/cars/:id/' => 'Delete car from database',
                    ]
                ]
            ]
        );
        exit;
    }
    
}
