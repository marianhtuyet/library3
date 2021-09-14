<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
    return view('category.category_content');
}); 
Route::get('homepage/index', 'IndexController@getList')->name('homepage.index');
Route::get('category/100','tpddcController@index')->name('category.100');
Route::get('book/book','BookController@index')->name('book.book');

// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/book/{id}', 'BookController@getBookInfo')->name('book.info');
 
// Đăng ký thành viên
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister');
 
// Đăng nhập và xử lý đăng nhập
Route::get('/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
 
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);
//Quên pass
// Route::get('/forgot-password', 'Auth\ForgotPasswordController@getReset')->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('reset-password/{token}', 'ResetPasswordController@reset')->name('reset-password');

//Author
## View 
Route::get('/authors', 'AuthorsController@index')->name('author');

## Create
Route::get('/authors/create', 'AuthorsController@add')->name('author.create');
Route::post('/authors/store', 'AuthorsController@store')->name('author.store');

## Update
Route::get('/authors/store/{id}', 'AuthorsController@edit')->name('author.edit');
Route::post('/authors/update/{id}', 'AuthorsController@update')->name('author.update');

## Delete
Route::get('/authors/delete/{id}', 'AuthorsController@destroy')->name('author.delete');