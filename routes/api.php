<?php

use App\Http\Controllers\API\StudentController;
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

Route::get('/student-data', [StudentController::class, 'index']);
Route::get('/student-data/{id}', [StudentController::class, 'show']);
Route::put('/update-student/{id}', [StudentController::class, 'update']);
Route::post('/add-student', [StudentController::class, 'store']);
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
