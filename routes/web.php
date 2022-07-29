<?php

use App\Models\{
	User,
	Preference,
};
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

Route::get('/one-to-one', function() {
	$user = User::with('preference')->first();

	if ($user->preference) {
		$user->preference->update([
			'backgrouns_color' => '#ddd'
		]);
	} else {
		$user->preference()->save(new Preference([
			'backgrouns_color' => '#fff'
		]));
	}

	$user->refresh();

	$user->preference->delete();
	$user->refresh();

	dd($user->preference);
});

Route::get('/', function () {
    return view('welcome');
});
