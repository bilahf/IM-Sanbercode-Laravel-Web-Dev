<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [HomeController::class,'index']);
Route::get('/register', [HomeController::class,'register']);
Route::post('/send', [HomeController::class,'send']);

Route::get('/table', function(){
    return view('halaman.table');
});
Route::get('/data-table', function(){
    return view('halaman.data-table');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);

    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category_id}', [CategoryController::class,'show']);

    Route::get('/category/{category_id}/edit', [CategoryController::class,'edit']);
    Route::put('/category/{category_id}', [CategoryController::class,'update']);

    Route::delete('/category/{category_id}', [CategoryController::class,'destroy']);




    //profile
    Route::resource('profile', ProfileController::class)->only(['index','update']);
    Route::post('/books/{id}/peminjaman', [BooksController::class, 'storeBorrow'])->name('peminjaman.store');


});

Route::resource('books',BooksController::class);

//crud books not middleware
// Route::get('/books', [BooksController::class,'index']);

// Route::get('/books/{category_id}', [BooksController::class,'show']);


Auth::routes();









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
