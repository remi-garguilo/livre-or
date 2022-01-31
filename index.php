<?php
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
require 'vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->setBasePath('/livre-or');
$router->map('GET', '/', 'home', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET|POST', '/connexion', 'auth/login', 'connexion');
$router->map('GET|POST', '/inscription', 'auth/inscription', 'inscription');
$router->map('GET|POST', '/logout', 'auth/logout', 'logout');
$router->map('GET|POST', '/profil', 'auth/profil', 'profil');
$router->map('GET|POST', '/changer_login', 'auth/changer_login', 'changer_login');
$router->map('GET|POST', '/changer_password', 'auth/changer_password', 'changer_password');
$router->map('GET|POST', '/commentaire', 'auth/commentaire', 'commentaire');
$router->map('GET|POST', '/livreor', 'livre-or', 'livreor');
$match = $router->match();
if (is_array($match)) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'],$match['params']);
    } else {
        $params = $match['params'];
        ob_start();
        require "views/{$match['target']}.php";
        $pageContent = ob_get_clean();
    }
    require 'views/layout.php';
} else {
    require "views/404.php";
}