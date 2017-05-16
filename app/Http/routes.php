<?php
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('user/{id}',function($id){
	return $id;
});

Route::get('calculate/{number1}/{operand}/{number2}', function($number1, $operand, $number2) {
	if ($number1 != null && $number2 != null) {
		switch ($operand) {
			case 'add' :
				return $number1 + $number2;
				break;
			case 'sub' :
				return $number1 - $number2;
				break;
			case 'mul' :
				return $number1 * $number2;
				break;
			case 'div' :
				return $number1 / $number2;
				break;
			default :
				return "Enter the right operand";
		}
	}
	else {
		return "enter two numbers";
	}
 
})
->where(['number1' => '[0-9]+', 'number2' => '[0-9]']);

//Forward the email
Route::get('email', function(){
   Mail::send('emails.sendEmail', ['name'=>'amrita'], function($message){
       $message->to('mfs.chitta@gmail.com','some one')->subject('welcome');
    });
});

// Display a form to create a blog post...
Route::get('register', 'RegisterController@index');

Route::post('register', 'RegisterController@store');

Route::get('show', 'RegisterController@show');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@loginProcess');
Route::get('/', 'LoginController@login');


Route::get('dashboard', 'DashboardController@index');
Route::get('logout', 'DashboardController@logout');

Route::post('getdata', 'UserController@view');
Route::post('update', 'UserController@update');
Route::post('delete', 'UserController@deleteRow');
Route::post('gitInfo', 'UserController@gitData');
