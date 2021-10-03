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
    return view('tpddcs.category_content');
}); 
Route::get('homepage/index', 'IndexController@getList')->name('homepage.index');

Route::get('tpddcs/100','tpddcController@find_book')->name('tpddcs.100');
Route::get('tpddcs/200','tpddcController@find_book_200')->name('tpddcs.200');
Route::get('tpddcs/300','tpddcController@find_book_300')->name('tpddcs.300');
Route::get('tpddcs/400','tpddcController@find_book_400')->name('tpddcs.400');
Route::get('tpddcs/500','tpddcController@find_book_500')->name('tpddcs.500');
Route::get('books/book','BookController@index')->name('books.book');

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

// Tpddc
    ## View 
    Route::get('/tpddcs', 'tpddcController@index')->name('tpddcs');

    ## Create
    Route::get('/tpddcs/create', 'tpddcController@add')->name('tpddcs.create');
    Route::post('/tpddcs/store', 'tpddcController@store')->name('tpddcs.store');

    ## Update
    Route::get('/tpddcs/store/{id}', 'tpddcController@edit')->name('tpddcs.edit');
    Route::post('/tpddcs/update/{id}', 'tpddcController@update')->name('tpddcs.update');

    ## Delete
    Route::get('/tpddcs/delete/{id}', 'tpddcController@destroy')->name('tpddcs.delete');
//Type book
    ## View 
    Route::get('/type_books', 'typeBookController@index')->name('type_books');

    ## Create
    Route::get('/type_books/create', 'typeBookController@add')->name('type_books.create');
    Route::post('/type_books/store', 'typeBookController@store')->name('type_books.store');

    ## Update
    Route::get('/type_books/store/{id}', 'typeBookController@edit')->name('type_books.edit');
    Route::post('/type_books/update/{id}', 'typeBookController@update')->name('type_books.update');

    ## Delete
    Route::get('/type_books/delete/{id}', 'typeBookController@destroy')->name('type_books.delete');

//Language
    ## View 
    Route::get('/language_books', 'languageBookController@index')->name('language_books');

    ## Create
    Route::get('/language_books/create', 'languageBookController@add')->name('language_books.create');
    Route::post('/language_books/store', 'languageBookController@store')->name('language_books.store');

    ## Update
    Route::get('/language_books/store/{id}', 'languageBookController@edit')->name('language_books.edit');
    Route::post('/language_books/update/{id}', 'languageBookController@update')->name('language_books.update');

    ## Delete
    Route::get('/language_books/delete/{id}', 'languageBookController@destroy')->name('language_books.delete');

//Publisher
    ## View 
    Route::get('/publishers', 'publishersController@index')->name('publishers');

    ## Create
    Route::get('/publishers/create', 'publishersController@add')->name('publishers.create');
    Route::post('/publishers/store', 'publishersController@store')->name('publishers.store');

    ## Update
    Route::get('/publishers/store/{id}', 'publishersController@edit')->name('publishers.edit');
    Route::post('/publishers/update/{id}', 'publishersController@update')->name('publishers.update');

    ## Delete
    Route::get('/publishers/delete/{id}', 'publishersController@destroy')->name('publishers.delete');

//Status book
    ## View 
    Route::get('/status_books', 'statusController@index')->name('status_books');

    ## Create
    Route::get('/status_books/create', 'statusController@add')->name('status_books.create');
    Route::post('/status_books/store', 'statusController@store')->name('status_books.store');

    ## Update
    Route::get('/status_books/store/{id}', 'statusController@edit')->name('status_books.edit');
    Route::post('/status_books/update/{id}', 'statusController@update')->name('status_books.update');

    ## Delete
    Route::get('/status_books/delete/{id}', 'statusController@destroy')->name('status_books.delete');
//Test image
    Route::get('/test_images/upload', 'testImageController@upload')->name('test_images.upload');
        ## Create
    Route::get('/test_images/create', 'testImageController@add')->name('test_images.create');
    Route::post('/test_images/store', 'testImageController@store')->name('test_images.store');

//Book management
    ## View 
    Route::get('/books', 'BookController@index')->name('books');

    ## Create
    Route::get('/books/create', 'BookController@add')->name('books.create');
    Route::post('/books/store', 'BookController@store')->name('books.store');

    ## Update
    Route::get('/books/store/{id}', 'BookController@edit')->name('books.edit');
    Route::post('/books/update/{id}', 'BookController@update')->name('books.update');

    ## Delete
    Route::get('/books/delete/{id}', 'BookController@destroy')->name('books.delete');


//theme
    ## View 
    Route::get('/themes', 'themeController@index')->name('themes');

    ## Create
    Route::get('/themes/create', 'themeController@add')->name('themes.create');
    Route::post('/themes/store', 'themeController@store')->name('themes.store');

    ## Update
    Route::get('/themes/store/{id}', 'themeController@edit')->name('themes.edit');
    Route::post('/themes/update/{id}', 'themeController@update')->name('themes.update');

    ## Delete
    Route::get('/themes/delete/{id}', 'themeController@destroy')->name('themes.delete');
//Site
    ## View 
    Route::get('/sites', 'sitesController@index')->name('sites');

    ## Create
    Route::get('/sites/create', 'sitesController@add')->name('sites.create');
    Route::post('/sites/store', 'sitesController@store')->name('sites.store');

    ## Update
    Route::get('/sites/store/{id}', 'sitesController@edit')->name('sites.edit');
    Route::post('/sites/update/{id}', 'sitesController@update')->name('sites.update');

    ## Delete
    Route::get('/sites/delete/{id}', 'sitesController@destroy')->name('sites.delete');

//Quality
    ## View 
    Route::get('/quality_books', 'qualityBooksController@index')->name('quality_books');

    ## Create
    Route::get('/quality_books/create', 'qualityBooksController@add')->name('quality_books.create');
    Route::post('/quality_books/store', 'qualityBooksController@store')->name('quality_books.store');

    ## Update
    Route::get('/quality_books/store/{id}', 'qualityBooksController@edit')->name('quality_books.edit');
    Route::post('/quality_books/update/{id}', 'qualityBooksController@update')->name('quality_books.update');

    ## Delete
    Route::get('/quality_books/delete/{id}', 'qualityBooksController@destroy')->name('quality_books.delete');
