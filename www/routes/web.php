<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'App\controllers\DefaultController@index');

$router->get('sitemap-generator', 'App\controllers\DefaultController@sitemapGenerator');

$router->get('w-trade-api-to-opencart2', 'App\controllers\DefaultController@wTradeApiToOpencart2');

$router->get('test', 'App\controllers\DefaultController@test');

$router->get('notifications', 'App\controllers\DefaultController@notifications');
