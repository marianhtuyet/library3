<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Sửa đường dẫn trang chủ mặc định
// Route::get('/home', 'IndexController@getList')->name('home');

// Sửa đường dẫn trang chủ mặc định
// Route::get('/', 'HocsinhController@index');
// Route::get('/home', 'HocsinhController@index');
 
// Đăng ký thành viên
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister');
 
// Đăng nhập và xử lý đăng nhập
Route::get('/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
 
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);