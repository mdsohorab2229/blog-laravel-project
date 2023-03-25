<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
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
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
