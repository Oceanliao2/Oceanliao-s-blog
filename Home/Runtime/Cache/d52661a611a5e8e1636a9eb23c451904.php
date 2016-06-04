<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>廖海洋的博客</title>
	<!--设置页面编码为UTF-8-->  
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8"/> 
<meta name="viewport" content="width=device-width, initial-scale=1">
   <!--它为文档定义了一组关键字。某些搜索引擎在遇到这些关键字时，会用这些关键字对文档进行分类-->
   <meta name="keywords" content="HelloWord">
   <!--以最高版本IE来渲染页面-->
   <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">  
   <!--使IE和chrome以最新方式渲染-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
   <!--使双核浏览器默认极速模式-->
   <meta name="renderer" content="webkit">
   <link rel="stylesheet" type="text/css" href="__UEDITOR__/dist/css/wangEditor.min.css">
   <link rel="stylesheet" type="text/css" href="__UEDITOR__/static/highlightjs/dark.css">

   <link rel="stylesheet" type="text/css" href="__CSS__/admin.css">
   <script type="text/javascript">
    /*
      //+----------------------------------------------------------------------
      // | Author: Oceanliao <1576701411@qq.com>
      // +----------------------------------------------------------------------
      // | [Ajax文件上传]  一个小工具，ajax图片上传，图片是存在贴图网的
      // | 服务器里的，开发的时候如果自己的服务器空间不够可以用这个来存图片。
      // +----------------------------------------------------------------------
    */
    function doUpload() {
     $("#mess").css("display","block");

     var formData = new FormData($( "#uploadForm" )[0]);
     $.ajax({
          url:  '__URL__/img_upload',
          type: 'POST',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function (returndata) {
              $("#mess").css("display","none");
              $("#url").append("图片地址 ："+returndata+"</br>");
          },
          error: function (returndata) {
              alert(returndata);
          }
     });
    }

    </script>
</head>
<body>
<div class="o_editor">
		<form method="post" action='__URL__/add' enctype="multipart/form-data" id="form">
			<center>
      <input class="o_title" type="text" name="title" placeholder="标题"></center><br/>
			<textarea name="message" id='textarea1' style='height:800px; width:100%;'></textarea>
			<br/>
			<input type="submit" class="button" value="发布">
      <br/>
      主人身份验证(⊙０⊙)<input type="hidden"  name="passcode" value="???">

		</form>
    </br>

    <div id="mess" style="color:red; display:none">请稍后。。</div>
    <form id="uploadForm" enctype="multipart/form-data" method="post" action="">
        <input type="file" name="file">
        <input type="button" value="上传" onclick="doUpload()"/>
    </form>
    <div id="url"></div>
</div>



</body>
<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->

<script type="text/javascript" src="__UEDITOR__/dist/js/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__UEDITOR__/dist/js/wangEditor.js"></script>


<!--注意：javascript必须放在body最后，否则可能会出现问题-->
<script type="text/javascript">
    wangEditor.config.mapAk = 'SsUyTglD4XCVznNRDDIU3F4D';  // 此处换成自己申请的密钥
    var editor = new wangEditor('textarea1');
    editor.create();
</script>
</html>