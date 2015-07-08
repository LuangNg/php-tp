<?php

return array(
    //'配置项'=>'配置值'
    'SESSION_AUTO_START' => true,
    'DEFAULT_V_LAYER' => 'View',
    'DEFAULT_THEME' => 'Default',
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'demo',
    'DB_USER' => 'root',
    'DB_PWD' => '123456',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
    'DB_DEBUG' => TRUE,
    'TMPL_PARSE_STRING' => array(
        // '../Public'	=>	MODULE_PATH.'View/Public/',
        // '__TMPL__' 	=>	MODULE_PATH.'View/default/',
        '__VIEW__' => MODULE_PATH . 'View/default',
    )
);
