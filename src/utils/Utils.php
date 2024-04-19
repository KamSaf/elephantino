<?php

function getUrlParams(): array
{
    $url = $_SERVER['REQUEST_URI'];
    $arr = explode('/', substr($url, 1, strlen($url)));
    return $arr;
}
