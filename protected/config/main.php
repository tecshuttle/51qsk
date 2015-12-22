<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Seed',
    'language' => 'zh_cn',
    'theme' => 'default',
    'timeZone' => 'Asia/Shanghai',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
    ),
    'modules' => array(
        'admini' => array(
            'class' => 'application.modules.admini.AdminiModule',
        ),
        'host' => array(
            'class' => 'application.modules.host.HostModule',
        ),
        'master' => array(
            'class' => 'application.modules.master.MasterModule',
        ),
        'student' => array(
            'class' => 'application.modules.student.StudentModule',
        ),
        'account' => array(
            'class' => 'application.modules.account.AccountModule',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
    ),
    'components' => array(
        'cache' => array(
            'class' => 'CFileCache',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=seed',
            'emulatePrepare' => true,
            'enableParamLogging' => true,
            'enableProfiling' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'seed_',
        ),
        'errorHandler' => array(
            'errorAction' => 'error/index',
        ),
        'urlManager' => array(
            //'urlFormat'=>'path',
            //'urlSuffix'=>'.html',
            'showScriptName' => true, //false: 去除index.php
            'rules' => array(
                'post/<id:\d+>/*' => 'post/show',
                'post/<id:\d+>_<title:\w+>/*' => 'post/show',
                'post/catalog/<catalog:[\w-_]+>/*' => 'post/index',
                'page/show/<name:\w+>/*' => 'page/show',
                'special/show/<name:[\w-_]+>/*' => 'special/show',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
		'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'error, warning',
                    'showInFireBug' => true,
                ),
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . DS . 'params.php'),
);

//end file
