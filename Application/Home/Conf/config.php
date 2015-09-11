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
    //邮件配置
    'THINK_EMAIL' => array(
        'SMTP_HOST'   => 'smtp.gmail.com', //SMTP服务器
        'SMTP_PORT'   => '465', //SMTP服务器端口
        'SMTP_USER'   => 'hank.wu@chinasystems.com', //SMTP服务器用户名
        'SMTP_PASS'   => '159753qaz!', //SMTP服务器密码
        'FROM_EMAIL'  => 'hank.wu@chinasystems.com', //发件人EMAIL
        'FROM_NAME'   => 'Luang.Ng', //发件人名称
        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
        'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
    ),
    'TMPL_PARSE_STRING' => array(
        // '../Public'	=>	MODULE_PATH.'View/Public/',
        // '__TMPL__' 	=>	MODULE_PATH.'View/default/',
        '../Public' => __ROOT__ . '/' . trim(MODULE_PATH, "\.\/\\") . '/View/Default/Public',
    )
);
