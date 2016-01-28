<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

//Routes for web
$api->version('v1', ['middleware' => 'api.auth', 'namespace' => 'App\Http\Controllers\V1\Web'], function ($api) {
    //web products
    $api->get('web/products/{id}/details-page', 'ProductController@getDetailsPage');

});

//Common routes
$api->version('v1', ['middleware' => 'api.auth', 'namespace' => 'App\Http\Controllers\V1\Common'], function ($api) {
    //products
    $api->get('common/products/featureds', 'ProductController@getFeaturedProducts');
    $api->get('common/products/', 'ProductController@getAllProducts');

    //categories
    $api->get('common/categories', 'CategoryController@index');
    $api->get('common/categories/tree', 'CategoryController@getTree');

});

