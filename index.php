<?php
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
require 'vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

//require 'config/routes.php';
$router->setBasePath('/livre-or');
$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/livreor/[*:slug]-[i:id]', 'livreor/article', 'article');
$match = $router->match( );
if (is_array($match)) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'],$match['params']);
    } else {
        $params = $match['params'];
        ob_start();
        require "templates/{$match['target']}.php";
        $pageContent = ob_get_clean();
    }
    require 'elements/layout.php';
} else {
    echo '404';
}