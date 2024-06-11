<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Spatie\FlareClient\Api;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/user/{id}', function (string $id) {
//     return new UserResource(User::findOrFail($id));
// });
//     Route::get('/users', function () {
//         return new UserCollection(User::all());
//         });
        
