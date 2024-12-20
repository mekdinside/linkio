<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkBlockController;
use App\Http\Controllers\MyLinkController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\TextBlockController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::put('/user/{id}', [UserController::class, 'updateProfile']);
Route::post('/user/{id}/profile-picture', [UserController::class, 'updateProfilePicture']);
Route::delete('/user/{id}/profile-picture', [UserController::class, 'deleteProfilePicture']);
Route::get('/user/search', [UserController::class, 'searchByUsername']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
Route::get('/link-blocks', [LinkBlockController::class, 'index']);
Route::post('/link-blocks', [LinkBlockController::class, 'store']);
Route::get('/link-blocks/{id}', [LinkBlockController::class, 'show']);
Route::put('/link-blocks/{id}', [LinkBlockController::class, 'update']);
Route::delete('/link-blocks/{id}', [LinkBlockController::class, 'destroy']);
Route::get('/link-blocks/mylink/{mylink_id}', [LinkBlockController::class, 'showByMyLink']);
Route::get('/mylinks', [MyLinkController::class, 'index']);
Route::get('/mylinks/{id}', [MyLinkController::class, 'show']);
Route::post('/mylinks', [MyLinkController::class, 'store']);
Route::put('/mylinks/{id}', [MyLinkController::class, 'update']);
Route::delete('/mylinks/{id}', [MyLinkController::class, 'destroy']);
Route::get('/mylinks/username/{username}', [MyLinkController::class, 'getByUsername']);
Route::post('/images', [ImageController::class, 'store']);
Route::get('/images', [ImageController::class, 'index']);
Route::get('/images/{id}', [ImageController::class, 'show']);
Route::put('/images/{id}', [ImageController::class, 'update']);
Route::delete('/images/{id}', [ImageController::class, 'destroy']);
Route::get('/notifikasis/user/{userId}', [NotifikasiController::class, 'getNotifikasisByUser']); 
Route::post('/notifikasi', [NotifikasiController::class, 'createNotifikasi']);
Route::prefix('text-blocks')->group(function () {
    Route::get('/', [TextBlockController::class, 'index']);
    Route::get('/{id}', [TextBlockController::class, 'show']);
    Route::post('/', [TextBlockController::class, 'store']);
    Route::put('/{id}', [TextBlockController::class, 'update']);
    Route::delete('/{id}', [TextBlockController::class, 'destroy']);
});