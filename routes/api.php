<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ImageController;
// use App\Notifications\LoginNotification;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPassController;
use App\Http\Controllers\Auth\EmailVerfyController;
use App\Http\Controllers\Auth\ForgetPassController;
use App\Http\Controllers\ProductsDiscountController;
use App\Http\Controllers\ProductsInventoryController;



Route::group(['middleware' => ['auth:sanctum']], function () {
  
    Route::post('/logout', [LoginController::class, 'logout']);
  
});





Route::middleware('auth:sanctum')->group(function () {
    // Route::get('/users', UserController::class,'index');
    Route::resource('/users', UserController::class);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/profile', function (Request $request) {
        return $request ->user();
       
    });
      });

// Route::get('profile/{update}',[ProfileController::class,'updateProfile']);
// Route::put('profile/update', [ProfileController::class, 'updateProfile']);
Route::put('profile/update',[ProfileController::class,'updateProfile']);



Route::post('login',[LoginController::class,'login']);
Route::post('register',[RegisterController::class,'register']);
Route::post('password/forget-password',[ForgetPassController::class,'forgetPassword']);
Route::post('password/reset-password',[ResetPassController::class,'passwordReset']);

 Route::post('email-verfication',[EmailVerfyController::class,'emailVerify']);
 Route::get('email-verfication',[EmailVerfyController::class,'resendEmailVerify']);









// Route::resource('/products', ProductsController::class);rrrrrrrr
// Route::post('/update/{id}', [ProductsController::class, 'update']);
// Route::post('/upload', [ImageController::class, 'upload']);

Route::get('/products', [ProductsController::class, 'index']);

 Route::post('/products', [ProductsController::class, 'store']);

 Route::get('/products/{products}', [ProductsController::class, 'show']);
 Route::put('/products/{products}', [ProductsController::class, 'update']);

 Route::delete('/products/{products}', [ProductsController::class, 'destroy']);
 Route::get('/products/search/{name}', [ProductsController::class, 'search']);
 Route::get('/products/search/categories/{name}', [ProductsController::class, 'searchCategories']);




 
// Route::resource('/categories', CategoriesController::class);


Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{categories}', [CategoriesController::class, 'show']);
Route::put('/categories/{categories}', [CategoriesController::class, 'update']);
Route::delete('/categories/{categories}', [CategoriesController::class, 'destroy']);

Route::get('/categories/search/{name}', [CategoriesController::class, 'search']);



// Route::resource('/Inventory', ProductsInventoryController::class);
Route::get('/Inventory', [ProductsInventoryController::class, 'index']);
Route::post('/Inventory', [ProductsInventoryController::class, 'store']);
Route::get('/Inventory/{Inventory}', [ProductsInventoryController::class, 'show']);
Route::put('Inventory/{Inventory}', [ProductsInventoryController::class, 'update']);
Route::delete('/Inventory/{Inventory}', [ProductsInventoryController::class, 'destroy']);
Route::get('/Inventory/search/{name}', [ProductsInventoryController::class, 'search']);





// Route::resource('/Discount',ProductsDiscountController::class);

Route::get('/Discount', [ProductsDiscountController::class, 'index']);
Route::post('/Discount', [ProductsDiscountController::class, 'store']);
Route::get('/Discount/{Discount}', [ProductsDiscountController::class, 'show']);
Route::put('Discount/{Discount}', [ProductsDiscountController::class, 'update']);
Route::delete('/Discount/{Discount}', [ProductsDiscountController::class, 'destroy']);
Route::get('/Discount/search/{name}', [ProductsDiscountController::class, 'search']);


// Route::resource('/shopping', ShoppingController::class);


Route::get('/shopping', [ShoppingController::class, 'index']);
Route::post('/shopping', [ShoppingController::class, 'store']);
Route::get('/shopping/{shopping}', [ShoppingController::class, 'show']);
Route::put('shopping/{shopping}', [ShoppingController::class, 'update']);
Route::delete('/shopping/{shopping}', [ShoppingController::class, 'destroy']);
Route::get('/shopping/search/{name}', [ShoppingController::class, 'search']);






// Route::resource('/cart', CartController::class);

// Route::get('/cart', [ProductsController::class, 'add']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart/{cart}', [CartController::class, 'show']);
Route::put('/cart/{cart}', [CartController::class, 'update']);
Route::delete('/cart/{cart}', [CartController::class, 'destroy']);
Route::get('/cart/search/{name}', [CartController::class, 'search']);





 


       



// // Public routes
// Route::prefix('admin')->group(function(){
//     Route::post('admin/login',[AdminController::class,'login']);
// });

