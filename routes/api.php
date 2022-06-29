<?php

use App\Http\Controllers\Api\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-message', [ApiController::class,'messageText']);
Route::post('/send-image', [ApiController::class,'messageImage']);
Route::post('/send-button', [ApiController::class,'messageButton']);
Route::post('/send-template', [ApiController::class,'messageTemplate']);
Route::post('/send-document', [ApiController::class,'messageDocument']);

Route::post('api_login', [ApiController::class,'login']);
Route::post('user/store', [ApiController::class,'userStore']);
Route::get('user/edit/{id}', [ApiController::class,'editUser']);
Route::post('user/update/{id}', [ApiController::class,'updateUser']);
Route::post('user/delete/{id}', [ApiController::class,'deleteUser']);




