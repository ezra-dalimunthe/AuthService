<?php
use Illuminate\Database\Connection;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return response()->json([
        "app version" => "1.0",
        "frame work"=>$router->app->version(),
        "docs" => route('docs'),
    ]);
});
$router->get('/api/v1/env-check', "AppCheckController@Inspection");
$router->get('/api/v1/log-check', "AppCheckController@testLog");

Route::get('/api/docs', ['as' => 'docs', function () {
    $paths = [
        base_path() . '/app/Models',
        base_path() . '/app/Requests',
        base_path() . '/app/Responses',
        base_path() . '/app/Http/Controllers',

    ];
    $openapi = \OpenApi\Generator::scan($paths);
    return response()->json($openapi)->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
    ]);;
}]);

foreach (glob(__DIR__ . "/endpoints/*.php") as $filename) {
    include $filename;
}




Route::get('/dbcheck', function () {
    // Test database connection
    try {
        DB::connection()->getPdo();
        echo "database " . DB::connection()->getDatabaseName(), " is ready\n" ;
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
   }
});
