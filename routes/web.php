<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Genratepdf;
use Illuminate\Support\Str;

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
    return view('welcome');
});
//create pdf routes
Route::view('form_user','form');
Route::post('usepdf',[Genratepdf::class, 'userdatapdf']);
Route::get('showdata', [Genratepdf::class, 'showpdfdata']);
//edit data
Route::get('edit/{id}', [Genratepdf::class, 'showdata']);
Route::post('/edit', [Genratepdf::class, 'updatedata']);

//Api Routes
Route::get('getapi', [Genratepdf::class, 'checkapi']);

//user login logout routes

Route::view('profile','profile');

Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user',null);
    }
    return redirect('login');
});
Route::get('/login', function () {
    if(session()->has('user')){
        return redirect('profile');
    }
    return view('login');
});
Route::post('users', [Genratepdf::class, 'userlogin']);


///uploade file

Route::view('fileupload', 'fileuploade');
Route::post('upload', [Genratepdf::class, 'fileupload']);

//check db operations
Route::get('list', [Genratepdf::class, 'operations']);

//database joins

Route::get('joins', [Genratepdf::class, 'joins']);
///Accessor
Route::get('accessor', [Genratepdf::class, 'accessors']);
//Mutator
Route::get('Mutator', [Genratepdf::class, 'mutator']);


//
Route::get('datarelationship', [Genratepdf::class, 'datarelationship']);



//Fluent string



$Info="hi, let's learn Laravel";
//$Info=ucfirst($Info);
//$Info=Str::replaceFirst('hi', 'HEllo', $Info);
//$Info=Str::camel($Info);
$Info=Str::of($Info)
          ->ucfirst($Info)
          ->replaceFirst('Hi', 'HEllo', $Info)
          ->camel($Info);
//echo $Info;





