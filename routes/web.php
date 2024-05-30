<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MahasiswaController;
use \App\Http\Controllers\DosenController;
use \App\Http\Controllers\ProdiController;
use \App\Http\Controllers\DashboardMahasiswaController;
use \App\Http\Controllers\DashboardDosenController;
use \App\Http\Controllers\DashboardProdiController;
use \App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware('auth');

Route::get('/index-mahasiswa',[MahasiswaController::class,'index']);
Route::get('/index-dosen',[DosenController::class,'index']);
Route::get('/index-prodi',[ProdiController::class,'index']);

// Route::get('/dashboard-mahasiswa',[DashboardMahasiswaController::class,'index']);
Route::resource('/dashboard-mahasiswa',DashboardMahasiswaController::class)->middleware('auth');
Route::resource('/dashboard-dosen',DashboardDosenController::class)->middleware('auth');
Route::resource('/dashboard-prodi',DashboardProdiController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
