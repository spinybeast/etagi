<?php
if (YII_DEBUG) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=etagi',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
} else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=etazhitr_database',
        'username' => 'etazhitr_admin',
        'password' => 'rherbrerb1',
        'charset' => 'utf8',
    ];
}
