<?php

use App\Http\Controllers\Front\FirstController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
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
    $obj = new \stdClass();
    $obj->name='ahmed';
    $obj->age=22;
    return view('welcome',compact('obj'));
});
Route::group(['prefix'=>'user'],function (){
    Route::get('/test1', function () {
    return 'welcome';
    })->middleware('auth');
//route parameters
    Route::get('/test2/{id}', function ($id) {
    return $id;
    })->name('a');
    Route::get('/test3/{id?}', function ($id = null) {
        if( isset($id)){
            return $id;
        }
        return 'welcome';
    })->name('b');

});
Route::namespace('Front')->group(function (){
    Route::get('/user2', [FirstController::class, 'PrintAdmin']);
});

Route::resource('news',NewsController::class);
Route::get('index',[FirstController::class, 'getindex']);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') ->middleware('verified');
Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);
