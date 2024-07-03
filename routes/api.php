<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\googleoauthController;
use App\Http\Controllers\productscontroller;
use App\Http\Controllers\registerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Routing untuk login
ROUTE::post('/login',[authController::class,'login']);
//Routing untuk register
ROUTE::post('/register',[registerController::class,'register']);
//Routing untuk googleAuth
ROUTE::get('/oauth/register',[googleoauthController::class,'redirect']);
ROUTE::get('/oauth/google/callback',[googleoauthController::class,'callback']);
    

// ROUTE::middleware(['user'])->group(function(){
//     //Routing untuk hak akses user dan admin


//     ROUTE::get('/products',[productscontroller::class,'read']);
//     ROUTE::post('/products',[productscontroller::class,'create']);
//     ROUTE::put('/products/{id}',[productscontroller::class,'update']);
//     ROUTE::delete('/products/{id}',[productscontroller::class,'delete']);
    
// });

ROUTE::middleware(['user:user,admin'])->group(function(){
    //Routing untuk hak akses user dan admin


    ROUTE::get('/products',[productscontroller::class,'read']);
    ROUTE::post('/products',[productscontroller::class,'create']);
    ROUTE::put('/products/{id}',[productscontroller::class,'update']);
    ROUTE::delete('/products/{id}',[productscontroller::class,'delete']);
    
});

ROUTE::middleware(['user:admin'])->group(function(){
    //Routing untuk hak akses admin

    
    ROUTE::post('/categories',[categoriesController::class,'create']);
    ROUTE::get('/categories',[categoriesController::class,'read']);
    ROUTE::put('/categories/{id}',[categoriesController::class,'update']);
    ROUTE::delete('/categories/{id}',[categoriesController::class,'delete']);
   
});
// ROUTE::middleware('admin')->group(function(){
//     //Routing untuk hak akses admin

    
//     ROUTE::post('/categories',[categoriesController::class,'create']);
//     ROUTE::get('/categories',[categoriesController::class,'read']);
//     ROUTE::put('/categories/{id}',[categoriesController::class,'update']);
//     ROUTE::delete('/categories/{id}',[categoriesController::class,'delete']);
   
// });






// <?php

// use App\Http\Controllers\authController;
// use App\Http\Controllers\categoriesController;
// use App\Http\Controllers\googleoauthController;
// use App\Http\Controllers\productscontroller;
// use App\Http\Controllers\registerController;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// //     return $request->user();
// // });

// //Routing untuk login
// ROUTE::post('/login',[authController::class,'login']);
// //Routing untuk register
// ROUTE::post('/register',[registerController::class,'register']);
// //Routing untuk googleAuth
// ROUTE::get('/oauth/register',[googleoauthController::class,'redirect']);
// ROUTE::get('/oauth/google/callback',[googleoauthController::class,'callback']);
    

// ROUTE::middleware(['user'])->group(function(){
//     //Routing untuk hak akses user dan admin


//     ROUTE::get('/products',[productscontroller::class,'read']);
//     ROUTE::post('/products',[productscontroller::class,'create']);
//     ROUTE::put('/products/{id}',[productscontroller::class,'update']);
//     ROUTE::delete('/products/{id}',[productscontroller::class,'delete']);
    
// });
// ROUTE::middleware('admin')->group(function(){
//     //Routing untuk hak akses admin

    
//     ROUTE::post('/categories',[categoriesController::class,'create']);
//     ROUTE::get('/categories',[categoriesController::class,'read']);
//     ROUTE::put('/categories/{id}',[categoriesController::class,'update']);
//     ROUTE::delete('/categories/{id}',[categoriesController::class,'delete']);

   
   
// });



