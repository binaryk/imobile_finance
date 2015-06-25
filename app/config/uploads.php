<?php

return [
	'apartament-photos' => [
		'file-name-pattern'  => '{{original}}-{{id_apartament}}-{{date}}.{{extension}}',
		'max-size'           => 5*1024,
		'allowed-extensions' => 'bmp,gif,jpeg,jpg,png',
		'path'               => str_replace('\\', '/', storage_path()) . '/uploads/{{id_apartament}}/'
	],
];