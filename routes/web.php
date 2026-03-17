<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

//Auth
Route::get('/signout', [AuthController::class, 'signout']);
Route::post('/registr', [AuthController::class, 'registr']);
Route::get('/signin', [AuthController::class, 'signin'])->name('login');
Route::post('authentication', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [MainController::class, 'index']);
Route::get('/gallery/{img}', [MainController::class, 'gallery']);

// Route::get('/about', function(){
//     return view('main/about');
// });

Route::get('/contacts', function(){
    $contacts = ['street' => "B.Semenovskaya",
                'home' => 38, 
                'phone' => '8(499)232-2323'];
    return view('main/contact', ['abracadabra'=>$contacts]);
});
