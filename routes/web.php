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
// use Illuminate\Support\Facades\Mail;
// use App\Mail\WelcomeMail;
// Route::get('/', function () {
//     Mail::to('email@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });

 //Route::get('home','EventController@index');
// Route::post('home/store','EventController@store')->name('store');
 

Route::view('/','home');
Route::view('/{any}', 'home');
Route::view('/{any}/{any1}', 'home');



