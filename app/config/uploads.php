<?php

return [
	'apartament-photos' => [
		'file-name-pattern' => '{{original}}-{{id_apartament}}-{{date}}.{{extension}}',
		'max-size' => 5 * 1024,
		'allowed-extensions' => 'bmp,gif,jpeg,jpg',
		'path' => str_replace('\\', '/', storage_path()) . '/uploads/{{id_apartament}}/',
		'id_name' => 'id_apartament',
	],
	'ansamblu-photos' => [
		'file-name-pattern' => '{{original}}-{{id_ansamblu}}-{{date}}.{{extension}}',
		'max-size' => 5 * 1024,
		'allowed-extensions' => 'bmp,gif,jpeg,jpg,png,pdf',
		'path' => str_replace('\\', '/', storage_path()) . '/uploads/ansambluri/{{id_ansamblu}}/',
		'id_name' => 'id_ansamblu',
	],
	'cladire-photos' => [
		'file-name-pattern' => '{{original}}-{{id_cladire}}-{{date}}.{{extension}}',
		'max-size' => 5 * 1024,
		'allowed-extensions' => 'bmp,gif,jpeg,jpg,png,pdf',
		'path' => str_replace('\\', '/', storage_path()) . '/uploads/cladiri/{{id_cladire}}/',
		'id_name' => 'id_cladire',
	],
	'apartament-cladire-photos' => [
		'file-name-pattern' => '{{original}}-{{id_apartament}}-{{date}}.{{extension}}',
		'max-size' => 5 * 1024,
		'allowed-extensions' => 'bmp,gif,jpeg,jpg,png,pdf',
		'path' => str_replace('\\', '/', storage_path()) . '/uploads/cladiri/apartamente/{{id_apartament}}/',
		'id_name' => 'id_apartament',
	],
];
