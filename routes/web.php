<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;


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



Route::get('index',[App\Http\Controllers\Controller::class,'index']);
Route::get('blog',[App\Http\Controllers\Controller::class,'blog']);
Route::get('edit-blog/{id}',[App\Http\Controllers\Controller::class,'edit_blog']);
Route::post('update_blog', [App\Http\Controllers\Controller::class,'update_blog']);
Route::get('blog-form',[App\Http\Controllers\Controller::class,'blog_form']);
Route::post('insert_blog_form', [App\Http\Controllers\Controller::class,'insert_blog_form']);
Route::get('delete_blog/{id}', [App\Http\Controllers\Controller::class,'delete_blog']);


Route::get('/',[App\Http\Controllers\HomeController::class,'web_index']);
Route::get('/redirects',[App\Http\Controllers\HomeController::class,'redirects']);
Route::get('sigin',[App\Http\Controllers\HomeController::class,'sigin']);
Route::post('sigin',[App\Http\Controllers\HomeController::class,'store']);

Route::get('foods', [App\Http\Controllers\HomeController::class,'foods']);
Route::get('deletefood/{id}', [App\Http\Controllers\HomeController::class,'deletefood']);




Route::get('/user', [App\Http\Controllers\Controller::class,'user']);
Route::get('/deleteuser/{id}', [App\Http\Controllers\Controller::class,'deleteuser']);
Route::get('/food', [App\Http\Controllers\Controller::class,'food']);
Route::post('/uploadfood', [App\Http\Controllers\Controller::class,'uploadfood']);
Route::get('/editfood/{id}', [App\Http\Controllers\Controller::class,'editfood']);
Route::post('/update/{id}', [App\Http\Controllers\Controller::class,'update']);
Route::get('/chef', [App\Http\Controllers\Controller::class,'chef']);
Route::post('/form', [App\Http\Controllers\Controller::class,'form']);
Route::get('/adminreservation', [App\Http\Controllers\Controller::class,'adminreservation']);


Route::get('foodchef',[App\Http\Controllers\HomeController::class,'foodchef']);
Route::post('/uploadchef',[App\Http\Controllers\Controller::class,'uploadchef']);
Route::get('/editchef/{id}',[App\Http\Controllers\Controller::class,'editchef']);
Route::post('/updatechef/{id}',[App\Http\Controllers\Controller::class,'updatechef']);
Route::delete('/deletechef/{id}', [Controller::class, 'deletechef'])->name('deletechef');

Route::post("/addcart/{id}",[App\Http\Controllers\HomeController::class,'addcart']);

Route::get("showcart",[App\Http\Controllers\HomeController::class,'showcart']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
