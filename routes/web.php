<?php

use App\Http\Controllers\WebsiteUsersController;
use Illuminate\Support\Facades\Route;

Route::get('/loginauth', [WebsiteUsersController::class, 'index']);
Route::get('/signup', [WebsiteUsersController::class, 'signup']);
Route::post('/loginauth', [WebsiteUsersController::class, 'loginauth']);
Route::post('/registeruser', [WebsiteUsersController::class, 'registeruser']);
Route::get('/home', [WebsiteUsersController::class, 'home']);
Route::get('/logout', [WebsiteUsersController::class, 'logout']);