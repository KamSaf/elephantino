<?php

function getUrl(): array
{
    $url = $_SERVER['REQUEST_URI'];
    return explode('/', substr($url, 1, strlen($url)));
}

function addrToReg(string $address): string
{
    $reg = explode('/', $address);
    for ($i=0; $i<count($reg); $i++) {
        if (str_contains(haystack: $reg[$i], needle: '<string:')) {
            $reg[$i] = '([0-9a-zA-Z\-]+)'; 
        }
        if (str_contains(haystack: $reg[$i], needle: '<int:')) {
            $reg[$i] = "([0-9]+)"; 
        }
    }
    return "/^" . implode(separator: '\/', array: $reg) . "(?:\/)?$/";
}
