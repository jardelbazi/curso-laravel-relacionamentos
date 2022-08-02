<?php

use App\Models\{
    Course,
    Permission,
    User,
	Preference,
};
use Illuminate\Support\Facades\Route;

Route::get('/many-to-many-pivot', function() {
	$user = User::with('permissions')->find(1);

	// $user->permissions()->attach([
	// 	1 => ['active' => false],
	// 	3 => ['active' => false],
	// ]);

	echo "<h3>{$user->name} </h3>";

	foreach ($user->permissions as $permission) {
		echo "{$permission->name} - {$permission->pivot->active} </br>";
	}

});

Route::get('/many-to-many', function() {
	$user = User::with('permissions')->find(1);

	// $permission = Permission::find(1);
	// $user->permissions()->save($permission);

	// $user->permissions()->saveMany([
	// 	Permission::find(1),
	// 	Permission::find(3),
	// 	Permission::find(2),
	// ]);

	//$user->permissions()->sync([2]);

	$user->permissions()->attach([1,3]);

	$user->permissions()->detach([1]);

	$user->refresh();

	dd($user->permissions);
});

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
