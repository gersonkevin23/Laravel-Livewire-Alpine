<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Posts\ShowPost;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use App\Http\Livewire\Posts\CreatePost;

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
Route::middleware(['role:Super Admin'])->group(function (){
    Route::get('/', function () {
        return redirect(route('admin-dashboard'));
    });
    Route::get('/dashboard',Dashboard::class)->name('admin-dashboard');
    Route::get('/user/add',\App\Http\Livewire\Admin\User\Create::class)->name('admin-add-user');
});

