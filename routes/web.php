<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\User;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',function(){
   return view('adminhome');
});
Route::get('categories/deleteimage','CategoryController@deleteimage')->name('categories.deleteimage');
Route::resource('categories','CategoryController')->except(['index']);

Route::get('categories/index/{category}','CategoryController@index')->name('categories.index');
Route::get('categories/create/{category}','CategoryController@create')->name('categories.create');
Route::get('categories/delete/{category}','CategoryController@destroy')->name('categories.delete');








Route::get('/tables',function (){
   $users=User::all();
    $users=User::where('id','>',10)->paginate(10);
return view('tables.tables',compact(['users']));
})->name('tables');
//
//Route::get('testform',function (){
//   return view('test.form');
//});
//Route::post('getform',function(Request $request){
//   dd($_POST);
//})->name('getform');
