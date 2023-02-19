<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\AdminController;
use App\Models\Thread;

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

Route::get('/mastermind', [AdminController::class, 'adminPanel'])->name('adminpanel');
Route::view('/login', 'admin.login')->name('adminlogin');
Route::post('/reply/delete', [ThreadController::class, 'delReply'])->name('delReply');
Route::post('/thread/delete', [ThreadController::class, 'delThread'])->name('delThread');
Route::post('/thread/feature', [ThreadController::class, 'featureThread'])->name('featureThread');
Route::post('/thread/unfeature', [ThreadController::class, 'unFeatureThread'])->name('unFeatureThread');
Route::post('/acplogin', [AdminController::class, 'checkLogin'])->name('acplogin');

Route::get('/overboard', [BoardController::class, 'overboard'])->name('overboard');
Route::get('/', [BoardController::class, 'index'])->name('index');
Route::get('/about', [BoardController::class, 'about'])->name('about');
Route::get('/{board_uri}/', [BoardController::class, 'getBoard'])->name('board');

Route::get('/{board_uri}/{thread_id}', [ThreadController::class, 'getThread'])->name('thread');
Route::post('/thread/new', [ThreadController::class, 'putThread'])->name('newthread');
Route::post('/reply/new', [ThreadController::class, 'putReply'])->name('newreply');
