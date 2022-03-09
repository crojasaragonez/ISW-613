<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;

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




require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    //only authenticated users can access these routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/create', [ClientController::class, 'create']);
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit']);
    Route::get('/clients/{id}/delete', [ClientController::class, 'delete']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/clients/{id}', [ClientController::class, 'update']);
    Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::get('/products/{id}/delete', [ProductController::class, 'delete']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::get('/products/{id}/recipe', [ProductController::class, 'recipe']);
    Route::post('/products/{id}/recipe', [ProductController::class, 'recipe']);
    Route::delete('/products/{product_id}/recipe/{id}', [ProductController::class, 'removeIngredient']);

    Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
    Route::get('/ingredients/create', [IngredientController::class, 'create']);
    Route::get('/ingredients/{id}/edit', [IngredientController::class, 'edit']);
    Route::get('/ingredients/{id}/delete', [IngredientController::class, 'delete']);
    Route::post('/ingredients', [IngredientController::class, 'store']);
    Route::put('/ingredients/{id}', [IngredientController::class, 'update']);
    Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy']);
});

