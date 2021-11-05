<?php

use Illuminate\Http\Request;

#import class
use Illuminate\Support\Facades\Route;
//manggil Controller nya 
use App\Http\Controllers\AnimalController;
//manggil Controller student nya 
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#animals API
#create f0r data animals
Route::get('/animals', [AnimalController::class, 'index']);
Route::post('/animals', [AnimalController::class, 'create']);
Route::put('/animals/{id}', [AnimalController::class, 'update']);
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

# Studets API 

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'create']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);