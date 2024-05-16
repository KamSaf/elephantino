<?php

function getUrl(): array
{
    $url = $_SERVER['REQUEST_URI'];
    return explode('/', substr($url, 1, strlen($url)));
}
