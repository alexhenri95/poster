<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Activity;
use App\Http\Livewire\PostShow;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Search;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', Posts::class)->name('dashboard');
Route::get('perfil/{user}', [UserController::class, 'show'])->name('profile.show');
Route::get('buscar', Search::class)->name('search.index');
Route::get('actividad-reciente', Activity::class)->name('activity.index');
Route::get('post/{post}', PostShow::class)->name('post.show');
