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

$api->version('v1', ['middleware' => 'api.auth', 'namespace' => 'App\Http\Controllers\V1\Web'], function ($api) {
    //web products
    $api->get('web/products/', 'ProductsController@index');
    $api->get('web/products/{id}/details-page', 'ProductController@getDetailsPage');

    //$api->get('test/', 'TestController@index');

});

$api->version('v1', ['middleware' => 'api.auth', 'namespace' => 'App\Http\Controllers\V1\Common'], function ($api) {
    //products
    $api->get('common/products/featureds', 'ProductController@getFeaturedProducts');

    //categories
    $api->get('common/categories', 'CategoryController@index');

});

//$api->version('v2',  function ($api) {
//    $api->get('emails/', 'App\Http\Controllers\V2\EmailController@index');
//});