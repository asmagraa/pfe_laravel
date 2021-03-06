<?php
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\Type_BooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TierController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\DownloadFileController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/file',[FileUploadController::class,'file']);

Route::get('/file',[FileUploadController::class,'index']);

Route::get('/file/{id}',[FileUploadController::class,'show']);

Route::put('/file/{id}',[FileUploadController::class,'update']);

Route::delete('/file/{id}',[FileUploadController::class,'destroy']);


Route::get('/books',[BookController::class,'index']);

Route::post('/books',[BookController::class,'store']);

Route::get('/books/{id}',[BookController::class,'show']);

Route::put('/books/{id}',[BookController::class,'update']);

Route::delete('/books/{id}',[BookController::class,'destroy']);


Route::get('/chapitres',[ChapitreController::class,'index']);

Route::post('/chapitres',[ChapitreController::class,'store']);

Route::get('/chapitres/{id}',[ChapitreController::class,'show']);

Route::put('/chapitres/{id}',[ChapitreController::class,'update']);

Route::delete('/chapitres/{id}',[ChapitreController::class,'destroy']);


Route::get('/typebooks',[Type_BooksController::class,'index']);

Route::post('/typebooks',[Type_BooksController::class,'store']);

Route::get('/typebooks/{id}',[Type_BooksController::class,'show']);

Route::put('/typebooks/{id}',[Type_BooksController::class,'update']);

Route::delete('/typebooks/{id}',[Type_BooksController::class,'destroy']);


Route::get('/users',[UserController::class,'index']);

Route::post('/users',[UserController::class,'store']);

Route::get('/users/{id}',[UserController::class,'show']);

Route::put('/users/{id}',[UserController::class,'update']);

Route::delete('/users/{id}',[UserController::class,'destroy']);



Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('/reset',[ResetController::class,'reset']);
Route::post('/resetPassword',[ChangePasswordController::class,'process']);
Route::get('/user-profile', [UserController::class, 'userProfile']); 
Route::put('/user-profile/{id}',[UserController::class,'update']);



Route::get('/tiers',[TierController::class,'index']);

Route::post('/tiers',[TierController::class,'store']);

Route::get('/tiers/{id}',[TierController::class,'show']);

Route::put('/tiers/{id}',[TierController::class,'update']);

Route::delete('/tiers/{id}',[TierController::class,'destroy']);


Route::get('/book_ocr',[Book_ocrResource::class,'index']);

Route::post('/book_ocr',[Book_ocrResource::class,'ocrbook']);

Route::get('/book_ocr/{id}',[Book_ocrResource::class,'show']);

Route::put('/book_ocr/{id}',[Book_ocrResource::class,'update']);

Route::delete('/book_ocr/{id}',[Book_ocrResource::class,'destroy']);
