<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'bot' => [
            'class' => \SonkoDmitry\Yii\TelegramBot\Component::class,
            'apiToken' => '645770281:AAGs2XfMsFr09ZTPquauj6VV_hQ_aDHOmOs'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
