<?php

$app = new Illuminate\Foundation\Application; 
$env = $app->detectEnvironment(array(
	'02-calin'  =>['Dell', 'PC1'],
	'local'     => ['WIN-KE1FRDKJTPK'],
	'02-server' => ['server1'],
	'03-andi'   => ['Andi-PC']
));
 
$app->bindInstallPaths(require __DIR__.'/paths.php');
$framework = $app['path.base'] . '/vendor/laravel/framework/src';

require $framework.'/Illuminate/Foundation/start.php';
require $app['path.base'] . '/app/helper.php' ;

require $app['path.base'] . '/app/~libs/extends/validation/users.validator.php' ;

require $framework . '/Illuminate/Foundation/start.php';
return $app;