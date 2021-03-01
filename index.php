<?php

define('PATH_ROOT', __DIR__);

require PATH_ROOT.'/vendor/autoload.php';

$router = new App\Core\Route();

include_once PATH_ROOT . '/app/Routes/routes.php';
include_once PATH_ROOT . '/app/Routes/api.php';

$requestUrl = '/home';
if (!empty($_SERVER['REQUEST_URI'])) {
    $arrayUrl = explode('?', $_SERVER['REQUEST_URI']);
    $requestUrl = $arrayUrl[0] === '/' ? '/home' : $arrayUrl[0];
}

$methodUrl = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

$router->map($requestUrl, $methodUrl);