<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/person/{id?}',function($dog){
    return $dog;
});
Route::get('/animals',function(){
    return 'dog and cat';
})->name('animals');

Route::group(['as'=>'animals.','prefix'=>'/animals'],function(){
    Route::get('dog',function(){
        return 'Woof';
    })->name('dog');
    Route::get('cat',function(){
        return 'meow';
    })->name('cat');
});

Route::get('home',function(){
    return view('home');
})->name('home');
Route::get('contact',function(){
    return view('contact');
})->name('contact');


Route::resource('blog', BlogController::class);
