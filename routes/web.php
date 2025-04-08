<?php
 
 use Illuminate\Support\Facades\Route;
 use Illuminate\Http\Request;
 use App\Services\UserService;
 use App\Services\ProductService;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\ProductController;
 use Illuminate\Support\Facades\Response;
 use App\Services\TaskService;
 
 
 Route::get('/', function () {
     return view('welcome');
     return view('welcome', ['name' => 'shanagonzales-app']);
 });
 Route::get('/users', [UserController::class, 'index']);
 Route::resource('product', ProductController::class);
 
 Route::get('/test-container', function (Request $request) {
     $container = $request->input('key');
     return $container;
 });
 
 Route::get('/test-provider', function (UserService $userService){
     return $userService->listUsers();
 });
 
 Route::get('/test-users', [UserController:: class, 'index']);
 
 Route::get('/test-facade', function(UserService $userService){
     return Response::json($userService->listUsers());
 });
 
 
 // Exercise #3
 
 Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
     return "Post ID: " . $postId . "- Comment: " . $comment;
 });
 
 Route::get('/post/{id}', function (string $id){
     return $id;
 })->where('id', '[0-9]+');
 
 Route::get('/search/{search}', function (string $search){
     return $search;
 })->where('search', '.*');
 
 Route::get('/test/route', function (){
     return route('test-route');
 })->name('test-route');
 
 Route::middleware(['user-middleware'])->group(function (){
     Route::get('/route-middleware-group/first', function (Request $request){
         echo 'firstt';
     });
 
     Route::get('/route-middleware-group/second', function (Request $request){
         echo 'secondd';
     });
 });
 
 Route::controller(UserController::class)->group(function(){
     Route::get('users', 'index');
     Route::get('users/first', 'first');
     Route::get('users/{id}', 'show');
 });
 
 Route::get('/token', function(Request $request){
     $token = $request->session()->token();
     return view('token', ['token' => $token]);
 });
 
 Route::post('/token', function(Request $request){
     return $request->all();
 });
 
 // Exercise #4
 Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');
 // Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');
 
 Route::resource('product', ProductController::class);
 // Route::resource('product', ProductController::class);
 
 Route::get('/product-list', function (ProductService $productService) {
     $data['products'] = $productService->listProducts();
     return view('products.list', $data);
     });