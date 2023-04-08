<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Products;

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
    $title = 'TTD Shopping';
    return view('home', compact('title'));
});

Route::get('product/{id}', [Products::class,'index']);

// Route::get('product/{id}', function (int $id) {
//     $title = $id;
//     return view('home', compact('title'));
// });

Route::get('test', function() {
    return "test";
});
