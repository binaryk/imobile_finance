<?php 

use Illuminate\Support\Facades\Config;

return array(

    'filename'  => '_ide_helper',
    'format'    => 'php',
    'include_helpers' => false,
    'helper_files' => array(
        base_path().'/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => array(
        'app/models',
    ),
    'extra' => array(
        'Artisan' => array('Illuminate\Foundation\Artisan'),
        'Eloquent' => array('Illuminate\Database\Eloquent\Builder', 'Illuminate\Database\Query\Builder'),
        'Session' => array('Illuminate\Session\Store'),
    ),
    'magic' => array(
        'Log' => array(
            'debug'     => 'Monolog\Logger::addDebug',
            'info'      => 'Monolog\Logger::addInfo',
            'notice'    => 'Monolog\Logger::addNotice',
            'warning'   => 'Monolog\Logger::addWarning',
            'error'     => 'Monolog\Logger::addError',
            'critical'  => 'Monolog\Logger::addCritical',
            'alert'     => 'Monolog\Logger::addAlert',
            'emergency' => 'Monolog\Logger::addEmergency',
        )
    ),
    'interfaces' => array(
        '\Illuminate\Auth\UserInterface' => Config::get('auth.model', 'User'),
    )

);
