<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Redirect the url when you come to the website and you are already logged in 
// because you get logged out after 120min of doing nothing

Route::get('/about', "PagesController@about");
Route::get('/services', "PagesController@services");

Route::resource('posts', 'PostsController');
Route::resource('c_v_s', 'CVController');
if(Auth::check() && Auth::user()->accountType == 'company'){
Route::get('posts/create', 'PostsController@create');
}
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/', "PagesController@index");

