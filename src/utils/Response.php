<?php

class Response
{
    public static function json(mixed $body, int $code = 200): string
    {
        header("Content-Type: application/json");
        return json_encode(["code" => $code, "body" => $body]);
    }

}
