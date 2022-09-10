<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\EmailVerifiyController;
use App\Http\Controllers\Auth\RessetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPointController;
use App\Http\Controllers\PsychiatristController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SocialResearcherController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
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


Route::middleware('Local')->group(function(){

    Route::middleware('guest')->group(function(){
        Route::get('/type-user',[AuthController::class , 'choiseGuard'])->name('auth.choise_guard');
        Route::get('/{guard}/login', [AuthController::class , 'loginPage'])->name('auth.login_page');
        Route::post('/login', [AuthController::class , 'login'])->name('auth.login');
        Route::get('/forgot',[RessetPasswordController::class , 'showForgot'])->name('auth.forgot');
        Route::post('/reset',[RessetPasswordController::class , 'sendLinkReset'])->name('auth.reset');
        Route::get('/reset-password/{token}',[RessetPasswordController::class , 'showResetPassword'])->name('password.reset');
        Route::post('/reset-password',[RessetPasswordController::class , 'resetPassword'])->name('auth.reset_password');
    });



    Route::middleware('auth:users,compony,employee')->group(function(){
        Route::get('/block',[AuthController::class , 'blockAccount'])->name('auth.block');
    });


    /// -------------------- Auth Routes -------------

    Route::middleware(['auth:users,compony,employee','Block'])->group(function(){
        // ----- Global Settings Route ---------
        Route::post('logout', [AuthController::class , 'logoutUser'])->name('auth.logout');
        Route::get('/',[HomeController::class , 'index'])->name('home.index');
        Route::post('/set-local',[HomeController::class , 'setLocal'])->name('set_local');
        Route::post('/change-password',[ChangePasswordController::class , 'changePassword'])->name('auth.change_password');


        Route::get('/notification',[HomeController::class , 'showNotification'])->name('notification');
        Route::post('/notification/read',[HomeController::class , 'readNotification'])->name('read_notification');
        
        // ----- PayPoints Settings Route ---------

        Route::resource('pay_points',PayPointController::class);

        // ----- Users Settings Route ---------
        Route::post('users/status/{user}',[UserController::class , 'changeStatus']);
        Route::resource('users',UserController::class);

        // ----- Employees Settings Route ---------
        Route::resource('employees',EmployeeController::class);

        // ----- City Settings Route ---------
        Route::resource('cities',CityController::class);

        // ----- Role Permission Settings Route ---------
        Route::put('/roles/{role}/giv-permission',[RolePermissionController::class , 'givPermissionRole']);
        Route::resource('roles',RolePermissionController::class);

        // ----- Category Settings Route ---------
        Route::post('categories/status/{category}',[CategoryController::class , 'changeStatus']);
        Route::resource('categories',CategoryController::class);

        // ----- Sub Category Settings Route ---------
        Route::post('sub_categories/status/{sub_category}',[SubCategoryController::class , 'changeStatus']);
        Route::resource('sub_categories',SubCategoryController::class);
        


        
        



        

    });

    
});




