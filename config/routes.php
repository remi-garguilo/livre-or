<?php

$router->map('GET', '/home', 'livre-or/home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/livreor/[*:slug]-[i:id]', 'livreor/article', 'article');
