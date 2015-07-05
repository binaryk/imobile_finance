<?php

/**
 * Profil
 */
Route::post('user/profile-save', [
	'as' => 'user-profile-save',
	'uses' => 'ProfileController@save'
]);

Route::get('user/profile', [
	'as' => 'user-profile',
	'uses' => 'ProfileController@index'
]);

/**
 * Utilizatori
 */
Route::get('utilizatori', [
	'as' => 'grid-utilizatori',
	'uses' => '\Utilizatori\UtilizatoriController@index'
]);

Route::get('utilizatori-row-source', [
	'as' => 'grid-utilizatori-row-source',
	'uses' => '\Utilizatori\UtilizatoriController@rows'
]);