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
   <link rel="stylesheet" type="text/css" href="__UEDITOR__/css/wangEditor-1.3.12.css">
   <link rel="stylesheet" type="text/css" href="__CSS__/admin.css">
</head>
<body>
	<div class="o_editor">
	
		<form method="post" action='__URL__/update' enctype="multipart/form-data" id="form">
			<center>
      <input class="o_title" type="text" name="title" value="<?php echo ($data[0]['title']); ?>"></center><br/>
			<textarea name="message" id='textarea1' style='height:500px; width:70%;'>
        <?php echo ($data[0]['message']); ?> 
      </textarea>
			<br/>
			<input type="submit" class="button" value="发布">
      <br/>
      主人身份验证(⊙０⊙)<input type="hidden"  name="passcode" value="???">

		</form>
	
	</div>
</body>
<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->
<script type="text/javascript" src='__UEDITOR__/js/jquery-1.10.2.min.js'></script>
<script type="text/javascript" src='__UEDITOR__/js/wangEditor-1.3.12.min.js'></script>
<!--注意：javascript必须放在body最后，否则可能会出现问题-->
<script type="text/javascript">
  $(function(){
        var editor = $('#textarea1').wangEditor();
    });
</script>
</html>