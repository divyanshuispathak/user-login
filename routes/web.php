<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){
//     return view('login');
// });

Route::post('/user', [UserController::class, 'userLogin']);

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/login', function () {
    if(session()->has('username'))
    {
        return redirect('/profile');
    }

    return view('login');
});

Route::get('/logout', function () {
    if(session()->has('username'))
    {
        session()->forget('username');
    }

    return redirect('login');
});