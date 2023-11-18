<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\front\MainController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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


Route::get('/home', function(){
    return view('front.pages.home');
})->name('home');

Route::prefix('/home')->controller(MainController::class)->group(function () {
    Route::get('/', 'index');
});

Route::get('/greeting/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'tr'])) {
        abort(400);
    }

    App::setLocale($locale);
});

Auth::routes();

Route::get('locale/{lange}', [LocalizationController::class, "setLang"]);
Route::get('logout', [LogoutController::class, "logout"])->name('logout');

