<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductCategoryController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/web', function () {
    $path_json = storage_path('app/data/product_categories.json');
    $product_categories = collect(json_decode(file_get_contents($path_json), true));
    foreach ($product_categories as $product_category) {
        
    }
    
    
});

Route::get('/register', [RegisterController::class, 'index']);

Route::resource('product-categories', ProductCategoryController::class);


