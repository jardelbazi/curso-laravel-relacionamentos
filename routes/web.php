<?php

use App\Models\{
    Course,
    User,
	Preference,
};
use Illuminate\Support\Facades\Route;

Route::get('/one-to-many', function() {
	$course = Course::with('modules.lessons')->first();

	// Inserir novo módulo no curso
	//$course->modules()->create(['name' => 'Módulo x2']);

	$modules = $course->modules;

	echo "<h1>{$course->name}</h1>";
	echo '<hr>';

	foreach ($course->modules as $module) {
		echo "<h2>{$module->name}</h2>";
		echo "<ul>";

		foreach ($module->lessons as $lesson) {
			echo "<li>{$lesson->name}</li>";
		}

		echo "</ul>";
	}

});

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
