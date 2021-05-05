<?php



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


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/photos', function () {
    return view('photos');
});
Route::get('/photos', 'ImagesController@index')->middleware('verified');
Route::post('/upload', 'ImagesController@store')->middleware('verified');
Route::post('/delete/{id}', 'ImagesController@delete')->middleware('verified');

Route::get('/notes', 'NotesController@index')->middleware('verified');
Route::post('/notes', 'NotesController@store')->middleware('verified')->name('note');


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
Route::get('/tbd', 'TodoController@index')->middleware('verified')->name('todo');
Route::post('/tbd', 'TodoController@store')->middleware('verified')->name('todo');
Route::post('/bookmark', 'BookmarkController@store')->middleware('verified')->name('todo');

