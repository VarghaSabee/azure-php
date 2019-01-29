<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\DB;
use App\Locations;


$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/hello', function () use ($router) {
    return 'Hello Vilag';
});



$router->get('/sysinfo', function () use ($router) {
    return Locations::all();
});

$router->post('/location/store/once','LocationsController@store');
$router->post('/location/remove/all','LocationsController@remove_all');
$router->get('/location/remove/once/{deviceID}','LocationsController@remove_one');
$router->get('/location/show/once/{deviceID}','LocationsController@show_one');
$router->get('/location/show/all','LocationsController@show_all');
// File store
$router->get('/store/file','LocationsController@storeDeviceFile');


$router->get('/storetest',  function () use ($router) {
    return view('store');
});

