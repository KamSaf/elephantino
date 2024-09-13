<?php

namespace Elephantino\Http;

/**
 * Class containing functions serving as different kinds of HTTP responses
 */
class Response
{
    /**
     * Response in a JSON format
     */
    public static function json(mixed $body, int $code = 200): void
    {
        http_response_code(response_code: $code);
        header('Content-Type: application/json');
        echo json_encode(['code' => $code, 'body' => $body]);
        exit();
    }

    public static function error(string $message, int $code = 500): void
    {
        Response::json(body: ['error' => $message], code: $code);
    }
}
