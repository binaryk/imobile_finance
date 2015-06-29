<?php

Route::post('user/profile-save', [
	'as' => 'user-profile-save',
	'uses' => 'ProfileController@save'
]);

Route::get('user/profile', [
	'as' => 'user-profile',
	'uses' => 'ProfileController@index'
]);