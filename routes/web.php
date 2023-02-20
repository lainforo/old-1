<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Thread;

/*
    This file contains routes for LainForo.
    Here is a basic rundown of syntax:

    To run a controller function: Route::GET/POST('PATH', [SomeController::class, 'FUNCTION'])->name('easy2remember_name');
    To render a view: Route::view('PATH', 'VIEW.NAME')->name('easy2remember_name');

*/

Route::get('/', [BoardController::class, 'index'])->name('index');

// User operations
Route::view('/user/login', 'user.login')->name('userLogin');
Route::post('/user/auth', [UserController::class, 'userAuth'])->name('userAuth');
Route::get('/user/panel', [UserController::class, 'userPanel'])->name('userPanel');

// Administrator actions
Route::get('/mastermind', [AdminController::class, 'adminPanel'])->name('adminpanel');
Route::view('/login', 'admin.login')->name('adminlogin');
Route::post('/acplogin', [AdminController::class, 'checkLogin'])->name('acplogin');

// Thread/reply operations
Route::post('/thread/new', [ThreadController::class, 'putThread'])->name('newthread');
Route::post('/reply/new', [ThreadController::class, 'putReply'])->name('newreply');
Route::post('/thread/delete', [ThreadController::class, 'delThread'])->name('delThread');
Route::post('/reply/delete', [ThreadController::class, 'delReply'])->name('delReply');
Route::post('/thread/feature', [ThreadController::class, 'featureThread'])->name('featureThread');
Route::post('/thread/unfeature', [ThreadController::class, 'unFeatureThread'])->name('unFeatureThread');

// Meta/misc stuff
Route::get('/overboard', [BoardController::class, 'overboard'])->name('overboard');
Route::get('/about', [BoardController::class, 'about'])->name('about');

// Board operations
// Note: I always put these at the bottom, because if they're written before other
// routes, it can screw things up.
Route::get('/{board_uri}/', [BoardController::class, 'getBoard'])->name('board');
Route::get('/{board_uri}/{thread_id}', [ThreadController::class, 'getThread'])->name('thread');
