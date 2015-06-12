<?php

return [
	'apartament-photos' => [
		'file-name-pattern'  => '{{original}}-{{id_apartament}}-{{date}}.{{extension}}',
		'max-size'           => 5*1024,
		'allowed-extensions' => 'bmp,doc,docx,gif,jpeg,jpg,pdf,png,txt,xls,xlsx,rar,zip',
		'path'               => str_replace('\\', '/', storage_path()) . '/uploads/{{id_apartament}}/'
	],
];