<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/podio', function () {
    return view('podio');
});

Route::get('/estadisticas', function () {
    return view('estadisticas');
});

Route::get('/posiciones', function () {
    return view('posiciones');
});

Route::get('/plantel', function () {
    return view('plantel');
});