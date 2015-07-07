<?php
return array(
	//'配置项'=>'配置值'
	'SESSION_AUTO_START'		=>			true,
	'DEFAULT_V_LAYER' 			=> 			'View',
	'DEFAULT_THEME'				=>			'Default',
	'TMPL_PARSE_STRING'			=>			array(
												// '../Public'	=>	MODULE_PATH.'View/Public/',
												// '__TMPL__' 	=>	MODULE_PATH.'View/default/',
												'__VIEW__'	=>	MODULE_PATH.'View/default',
											)
);