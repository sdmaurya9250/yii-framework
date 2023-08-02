<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // The database component to use
            'tableName' => '{{%queue}}', // The name of the table storing the queue data
            'channel' => 'default', // The queue channel to use
            'mutex' => \yii\mutex\MysqlMutex::class, // The mutex component to use
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
