<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

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
//lang
// Route::redirect('/','/en');
// Route::group(['prefix'=>'{language}'],function () {
    

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/hello', 'HomeController@hello')->name('hello');
//Tweets
Route::get('/timeline','TweetsController@timeline');
Route::post('/creattimeline','TweetsController@createTweet')->name('createTweet');
Route::get('/creattimeline/{id}', function ($id) {
    $tweets=Tweet::find($id);
    $tweets->delete();
    return redirect("http://localhost:8080/twiter/public/timeline");
});
Route::get('/edittimeline/{$id}','TweetsController@EditTweet');
Route::post('/edittimeline/{$id}','TweetsController@eEditTweet');

//SendEmail
Route::get('/email', 'EmailController@create');
Route::post('/email', 'EmailController@sendEmail')->name('send.email');
// lang
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
// Route::get('/languageDemo', 'HomeController@languageDemo');
