<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('siswa', function () {
    return view('siswa');
});
Route::get('guru', function () {
    return view('guru');
});
Route::get('pengumuman', function () {
    return view('pengumunman');
});
Route::get('arsip', function () {
    return view('arsip');
});
Route::get('piket', function () {
    return view('piket');
});
