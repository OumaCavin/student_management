<?php

//return [
 //   'class' => 'yii\db\Connection',
 //   'dsn' => 'mysql:host=localhost;dbname=yii2basic',
  //  'username' => 'root',
  //  'password' => '',
  //  'charset' => 'utf8',
//
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
    
//];


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=41.89.92.237;port=5432;dbname=devdb1',
    'username' => 'smisdev',
    'password' => 'Nduk_stg_smis2023',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'smis', // Set your default schema here
        ],
    ],
];

