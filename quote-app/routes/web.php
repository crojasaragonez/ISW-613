<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\IngredientController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/clients/create', [ClientController::class, 'create']);
Route::get('/clients/{id}/edit', [ClientController::class, 'edit']);
Route::get('/clients/{id}/delete', [ClientController::class, 'delete']);
Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::get('/ingredients/create', [IngredientController::class, 'create']);
Route::get('/ingredients/{id}/edit', [IngredientController::class, 'edit']);
Route::get('/ingredients/{id}/delete', [IngredientController::class, 'delete']);
Route::post('/ingredients', [IngredientController::class, 'store']);
Route::put('/ingredients/{id}', [IngredientController::class, 'update']);
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy']);