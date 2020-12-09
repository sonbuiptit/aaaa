<?php

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

Route::group(['prefix'=>'User', 'middleware'=>'TestMiddle'], function (){
   Route::get('list', [App\Http\Controllers\User\UserController::class, 'index'])->name('UserList');
   Route::get('update/{id}', [App\Http\Controllers\User\UserController::class, 'edit']);
   Route::post('update/{id}', [App\Http\Controllers\User\UserController::class, 'update']);
   Route::get('add', [App\Http\Controllers\User\UserController::class, 'create']);
   Route::post('add', [App\Http\Controllers\User\UserController::class, 'store']);
   Route::get('destroy/{id}', [App\Http\Controllers\User\UserController::class, 'destroy']);
   Route::get('number', [App\Http\Controllers\User\UserController::class, 'numberPost']);
   Route::get('setCookie', [App\Http\Controllers\User\UserController::class, 'setCookie']);
   Route::get('getCookie', [App\Http\Controllers\User\UserController::class, 'getCookie']);


});

Route::group(['prefix'=>'Post', 'middleware'=>'TestMiddle'], function (){
    Route::get('list', [App\Http\Controllers\Post\PostController::class, 'index']);
    Route::get('update/{postId}', [App\Http\Controllers\Post\PostController::class, 'edit']);
    Route::post('update/{postId}', [App\Http\Controllers\Post\PostController::class, 'update']);
    Route::get('add', [App\Http\Controllers\Post\PostController::class, 'create']);
    Route::post('add', [App\Http\Controllers\Post\PostController::class, 'store']);
    Route::get('destroy/{postId}', [App\Http\Controllers\Post\PostController::class, 'destroy']);
});

Route::get('login', [App\Http\Controllers\User\UserController::class, 'getLogin']);

Route::post('login', [App\Http\Controllers\User\UserController::class, 'postLogin']);

Route::get('logout', [App\Http\Controllers\User\UserController::class, 'logout'])->name('logout');










//Route::get('/', function () {
//    return view('testView.layoutPhp');
//});
//
//Route::get('diem', function (){
//    return redirect()->route('UserList');
//})->middleware('TestMiddle')->name('diem');
//Route::get('loi', function (){
//    echo 'bạn chưa có điểm';
//})->name('loi');
//Route::get('nhapdiem', function (){
//   return view('Diem');
//});



//Route::get('them post', function (){
//    $post = new App\Models\post();
//    $post->postName = "chu tho";
//    $post->content = "co tich";
//    $post->id = "1";
//    $post->save();
//    echo "them user thanh công";
//});

//Route::resource('post', 'App\Http\Controllers\post\PostController');
Route::resource('User', 'App\Http\Controllers\user\UserController', ['only'=> ['index']]);



