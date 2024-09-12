<?php
require_once "{$rootPath}/src/traits/RoutesTrait.php";

/**
 * Router class is supposed to be used to split endpoints
 * in the app to improve code readability
 */

class Router
{
    use RoutesTrait;
}
