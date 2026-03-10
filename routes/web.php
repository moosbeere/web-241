<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);

// Route::get('/about', function(){
//     return view('main/about');
// });

Route::get('/contacts', function(){
    $contacts = ['street' => "B.Semenovskaya",
                'home' => 38, 
                'phone' => '8(499)232-2323'];
    return view('main/contact', ['abracadabra'=>$contacts]);
});
