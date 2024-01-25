<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VegetableController;
use App\Http\Controllers\CartController;

Route::get('/register/{locale?}', [PageController::class, 'registerPage'])->name('registerPage');
Route::get('/login', [PageController::class, 'loginPage'])->name('loginPage');

Route::post('/registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::group(['middleware' => ['web','auth']], function() {
    Route::get('/dashboard', [PageController::class, 'dashboardPage'])->name('dashboardPage');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/detail/{id}', [VegetableController::class, 'showDetail'])->name('detail');

    Route::post('/addToCart/{vegetable_id}', [CartController::class , 'addToCart'])->name('addCart');
    Route::get('/cart', [PageController::class, 'cartPage'])->name('cartPage');
    Route::delete('/remove/{vegetable_id}', [CartController::class, 'removeItem'])->name('remove');
    Route::delete('/checkOut', [CartController::class, 'checkOut'])->name('checkOut');

    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::patch('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/dashboardAdmin', [PageController::class, 'dashboardAdminPage'])->name('dashboardAdmin')->middleware('isAdmin');
    Route::get('/account', [PageController::class, 'accountPage'])->name('accountPage')->middleware('isAdmin'); 

    Route::delete('/removeAccount/{id}', [UserController::class, 'removeAccount'])->name('removeAccount')->middleware('isAdmin');
    Route::get('/updateRoleUser/{id}', [PageController::class, 'updateRolePage'])->name('updateRolePage')->middleware('isAdmin');
    Route::patch('/updateRole/{id}', [UserController::class, 'updateRole'])->name('updateRole')->middleware('isAdmin');
});




