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