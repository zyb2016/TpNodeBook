<?php
return array(
	//'配置项'=>'配置值'
    //数据库配置
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'notebook',
    'DB_USER' => 'notebook',
    'DB_PWD' => 'notebook',
    'DB_PREFIX' => 'notebook_',
    'DB_PORT' => '3306',
    //'DB_TYPE' => 'mysql',
    'DB_TYPE' => 'mysqli',

    'URL_MODEL' => '3',
    //开启调试模式
    'SHOW_PAGE_TRACE' => true,
    //伪静态后缀
    'URL_HTML_SUFFIX' => '',
    //自定义模板路径
    'TMPL_PARSE_STRING' => array(
	'__PUBLIC__' => __ROOT__.'/Public',
	'__ADMINCSS__' => __ROOT__.'/'.APP_NAME.'/Admin/Public/CSS',
	'__ADMINJS__' => __ROOT__.'/'.APP_NAME.'/Admin/Public/JS',
	'__ADMINIMAGE__' => __ROOT__.'/'.APP_NAME.'/Admin/Public/IMAGES',
	'__HOMECSS__' => __ROOT__.'/'.APP_NAME.'/Home/Public/CSS',
	'__HOMEIMAGE__' => __ROOT__.'/'.APP_NAME.'/Home/Public/IMAGES',
	'__HOMEJS__' => __ROOT__.'/'.APP_NAME.'/Home/Public/JS'
    ),

    'TMPL_L_DELIM' => '<{',
    'TMPL_R_DELIM' => '}>'
	
	//'TAGLIB_BEGIN'=>'[',   //这里没用
	//'TAGLIB_END'=>']',
);
