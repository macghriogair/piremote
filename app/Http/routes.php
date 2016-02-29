<?php

use Illuminate\Support\Facades\View;

/*\DB::listen(function ($query) {

    var_dump($query->sql);

    \Log::info($query->sql);
    \Log::info(print_r($query->bindings, 1));
    \Log::info($query->time);
});*/

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

$app->get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
$app->post('/plug/{id}', 'HomeController@plug');
