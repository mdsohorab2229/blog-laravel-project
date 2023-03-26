<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[FrontendController::class, 'index'])->name('front.index');
Route::get('/single-post',[FrontendController::class, 'single'])->name('front.single');

Route::group(['middleware'=>['auth']], function (){

    Route::group(['prefix'=>'dashboard'], function (){
        Route::get('/',[BackendController::class, 'index'])->name('back.index');
        Route::resource('category',CategoryController::class);
        Route::get('get-subcategory/{id}', [SubCategoryController::class, 'getSebCategoryIdByCategoryId']);
        Route::resource('sub-category',SubCategoryController::class);
        Route::resource('tag', TagController::class);
        Route::resource('post', PostController::class);
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
