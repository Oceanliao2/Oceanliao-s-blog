﻿<?php
return array(
    //'配置项'=>'配置值'
    //数据库配置信息
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => 'localhost', // 服务器地址
        'DB_NAME'   => 'oceanliao', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '', // 密码
        'DB_PORT'   => 3306, // 端口
        'DB_PREFIX' => 'ocean_', // 数据库表前缀

      // 'SHOW_PAGE_TRACE'=>true,//调试

        'TMPL_PARSE_STRING'=>array(     //添加自己的模板变量规则
        '__CSS__'=>__ROOT__.'/Public/Css',
        '__JS__'=>__ROOT__.'/Public/Js',
        '__IMAGES__'=>__ROOT__.'/Public/Images',
        '__UPLOADS__'=>__ROOT__.'/Uploads',
        '__UEDITOR__'=>__ROOT__.'/wangEditor',
        ),


);
?>
