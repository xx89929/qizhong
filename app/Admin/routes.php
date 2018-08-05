<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('banner', 'BannerController');
    $router->resource('webset', 'WebSetController');
    $router->resource('nav', 'NavsController');
    $router->resource('tc', 'TemplateCategoryController');
});
