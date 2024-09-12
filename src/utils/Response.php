<?php

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
        header('Content-Type: application/json');
        echo json_encode(['code' => $code, 'body' => $body]);
        exit();
    }

    public static function error(string $message, int $code = 500): void
    {
        header('Content-Type: application/json');
        echo json_encode(['code' => $code, 'body' => ['error' => $message]]);
        exit();
    }
}
