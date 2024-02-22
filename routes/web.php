<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view ('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view ('about', [
        "title" => "About",
        "nama"=> "Arvia Faustina Ardhan",
        "kelas"=> "11 PPLG 2",
        "foto"=> "images/logoUser.jpg"
    ]);
});

Route::group(['prefix' => '/login'], function () {
    Route::get('/index', [LoginController::class, 'index'])->name('login');
    Route::post('/index', [LoginController::class, 'login'])->name('login');
});

Route::get('/dashboard/all', [DashboardController::class, 'all'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/register'], function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

Route::group(['prefix' => '/dashboard'], function () {
    Route::group(['prefix' => '/all'], function () {
        Route::get('/all', [DashboardController::class, 'all'])->name('dashboard.all.all');
    });
    Route::group(['prefix' => '/grade'], function () {
        Route::get('/all', [DashboardController::class, 'gradeAll'])->name('dashboard.grade.all');
        Route::get('/detail/{kelas}', [DashboardController::class, 'gradeShow']);
        Route::get('/create', [DashboardController::class, 'gradeCreate']);
        Route::post('/add', [DashboardController::class, 'gradeAdd']);
        Route::delete('/delete/{kelas}', [DashboardController::class, 'gradeDestroy']);
        Route::get('/edit/{kelas}', [DashboardController::class, 'gradeEdit']);
        Route::post('/update/{kelas}', [DashboardController::class, 'gradeUpdate']);
    });
    Route::group(['prefix' => '/student'], function () {
        Route::get('/all', [DashboardController::class, 'studentAll'])->name('dashboard.student.all');
        Route::get('/detail/{student}', [DashboardController::class, 'studentShow']);
        Route::get('/create', [DashboardController::class, 'studentCreate']);
        Route::post('/add', [DashboardController::class, 'studentAdd']);
        Route::delete('/delete/{student}', [DashboardController::class, 'studentDestroy']);
        Route::get('/edit/{student}', [DashboardController::class, 'studentEdit']);
        Route::post('/update/{student}', [DashboardController::class, 'studentUpdate']);
    });
});

Route::group(["prefix"=>"/grade"], function() {
    Route::get('/all', [KelasController::class, 'index']);
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/add', [KelasController::class, 'add']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::post('/update/{kelas}', [KelasController::class, 'update']);
});

Route::group(["prefix"=>"/student"],function() {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/add', [StudentsController::class, 'add']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::post('/update/{student}', [StudentsController::class, 'update']);
});
