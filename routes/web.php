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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'Front\LanguageController@switchLang']);
Route::get('/', 'Front\HomeController@home')->name('home');
Route::get('/xeberler', 'Front\NewsController@news');
Route::get('xeberler/{slug}', 'Front\NewsController@singleNews');
Route::get('/fotoqalereya', 'Front\PhotoController@photo');
Route::get('/{slug}', 'Front\StaticController@staticPage');



Route::prefix('administrator/airlines-nakhchivan')->middleware("auth")->group(function () {
    Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::resource('/menu', 'Admin\MenuController');
    Route::post('menu/changeStatus', 'Admin\MenuController@changeStatus')->name('menu.changeStatus');
    Route::get('/static', 'Admin\AdminController@staticCategory')->name('static');
    Route::resource('/static-page', 'Admin\StaticPageController');
    Route::post('/static-page/upload', 'Admin\StaticPageController@upload')->name('static-page.upload');
    Route::get('photo', 'Admin\PhotoGalleryController@dropzone')->name('dropzonePhoto');
    Route::post('photo/destroy', 'Admin\PhotoGalleryController@dropzoneDestroy')->name('dropzonePhoto.destroy');
    Route::post('photo/store', 'Admin\PhotoGalleryController@dropzoneStore')->name('dropzonePhoto.store');
    Route::resource('/post', 'Admin\PostController');
    Route::post('post/changeStatus', 'Admin\PostController@changeStatus')->name('post.changeStatus');
    Route::post('/post/upload', 'Admin\PostController@upload')->name('post.upload');
    Route::resource('/useful', 'Admin\UsefulController');
    Route::post('useful/changeStatus', 'Admin\UsefulController@changeStatus')->name('useful.changeStatus');
    Route::resource('/tourism', 'Admin\TourismController');
    Route::post('tourism/changeStatus', 'Admin\TourismController@changeStatus')->name('tourism.changeStatus');
    Route::resource('/settings', 'Admin\SettingController');
});

Route::prefix('administrator/airlines-nakhchivan')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/login', 'Auth\LoginController@login');
});
