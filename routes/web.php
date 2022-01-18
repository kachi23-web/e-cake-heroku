<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\ProductController;
use App\Http\Controllers\SuperAdmin\OrderController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\ToolsCartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/',[FrontendController::class,'index']);
 Route::get('/blog',[FrontendController::class,'blog']);
 Route::get('/contact',[FrontendController::class,'contact']);

 Route::get('category',[FrontendController::class,'category']);
 Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
 Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//older version of laravel
/* Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

}); 
*/

/* Route::middleware(['auth','isAdmin']) -> group(function () {
    Route::get('/dashboard', 'ADMIN\FrontendController@index');
    });   */
    

    Route::post('add-to-cart',[CartController::class,'addProduct']);
    Route::post('update-cart',[CartController::class,'updatecart']);
    Route::post('delete-cart-item',[CartController::class,'deleteProduct']);

   Route::middleware(['auth'])->group(function (){
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::resource('tools',ToolsCartController::class);

    //Route::get('my-orders',[UserController::class,'index']);
});
  Route::middleware(['auth','isAdmin']) -> group(function () {
    Route::get('/dashboard', 'SuperAdmin\FrontendController@index');
        //return view('admin.dashboard');
        //return view('admin.index');
    });

    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-categories',[CategoryController::class,'add']);
    Route::post('insert-categories',[CategoryController::class,'insert']);
    Route::get('edit-categories/{id}',[CategoryController::class,'edit']);
    Route::patch('update-categories/{id}',[CategoryController::class,'update']);
    Route::get('delete-categories/{id}',[CategoryController::class,'destroy']);

    //Route::resource('categories',Admin\CategoryController::class);


    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'add']);
    Route::post('insert-products',[ProductController::class,'insert']);
    Route::get('edit-products/{id}',[ProductController::class,'edit']);
    Route::patch('update-products/{id}',[ProductController::class,'update']);
    Route::get('delete-products/{id}',[ProductController::class,'destroy']);

   // Route::get('users',[FrontendController::class,'users']);
Route::middleware(['auth'])->group(function (){
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);


    Route::get('my-orders',[UserController::class,'index']);
});
