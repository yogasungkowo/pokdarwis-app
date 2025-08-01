<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main_page.index');
});
