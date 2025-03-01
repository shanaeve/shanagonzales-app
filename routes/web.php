<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facade\Response;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* SERVICE CONTAINER*/
Route::get('/shana', function (Request $request) {
    $input = $request->input ('key');
    return $input;
});

//SERVICE PROVIDER
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

//SERVICE CONTROLLER
Route::get('/test-controller',[UserController::class,'index']);

//FACADE
Route::get('/test-facade',function(UserService $userService){
    return Response::json($userService->listUsers());
});

//Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function(string $postId, string $comment){
    return "Post ID: " . $postId . "_ Comment: ". $comment;
});

Route::get('/post/{id}', function (string $id){
    return $id;
})->where('id', '[o-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where ('search', '.*');

//Named route or route alias
Route::get('/test/route', function () {
    return route('test-route');
})->name ('test-route');

//Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

//Route -> Controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

// CSRF
Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});