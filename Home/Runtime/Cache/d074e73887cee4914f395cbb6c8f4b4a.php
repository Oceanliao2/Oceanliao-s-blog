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
	<link href="__CSS__/Eindex.css" rel="stylesheet">
	<link href="__CSS__/ionicons.min.css" rel="stylesheet">
	<script src="__JS__/jquery.min.js"></script>
	<script src="__JS__/Eindex.js"></script>
	<link rel="stylesheet" type="text/css" href="__UEDITOR__/dist/css/wangEditor.min.css">
    <link rel="stylesheet" type="text/css" href="__UEDITOR__/static/highlightjs/dark.css">
    
</head>
<body>
<div id="BODY">
	<div class="left">
		<div class="left_top">
			<div class="me">
				<img src="__IMAGES__/me.jpg" style="border-radius:100%;">
			</div>
		</div>
		<div class="message">
				<h1>廖海洋</h1>
				<div class="small_screen">
				    <small>时间不在于你拥有多少而在于你怎样使用</small>
				</div>
				<div class="small_screen_p">
					<a href="__URL__/Eindex"><p class="active">首页</p></a>
					<a href="__URL__/heart"><p>心情</p></a>
					<a href="__URL__/all"><p>归档</p></a>
					<a href="__URL__/about"><p>关于</p></a>
					<a href="__URL__/message"><p>留言</p></a>
				</div>
		 </div>
	</div>
	<div class="right">
		<center>
			<div class="right_top">
				<div class="right_top_body">
					<h1 style="font-size: 40px; float: left;">Ocean's Blog</h1>
					<a href="__URL__/admin">
						<button style="float:right">后台</button>
					</a>
					<a href="__URL__/about">
					<button style="float:right">关于我</button>
					</a>
					<a href="__IMAGES__/Oceanliao.zip">
					<button style="float:right">源码</button>
					</a>
				</div>
			</div>
			<div class="right_body2">
			<form method="post" action='__URL__/leave_word' enctype="multipart/form-data" id="form"> 
					留下你的大名吧：<br><br>
					<input name="name" style="padding:5px" type="text"><br><br>
					<textarea name="message" id='textarea1' style='height:300px; width:70%;'></textarea>
					<input type="submit" class="button" value="留言">
			</form>		
			</div>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right_body">
				<h1><?php echo ($vo['name']); ?>:</h1>
				<?php echo ($vo['message']); ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>	
		</center>			
	</div>
</div>
</body>
<!--引入jquery和wangEditor.js-->   <!--注意：javascript必须放在body最后，否则可能会出现问题-->

<script type="text/javascript" src="__UEDITOR__/dist/js/lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__UEDITOR__/dist/js/wangEditor.js"></script>


<!--注意：javascript必须放在body最后，否则可能会出现问题-->
<script type="text/javascript">
    wangEditor.config.mapAk = 'SsUyTglD4XCVznNRDDIU3F4D';  // 此处换成自己申请的密钥
    var editor = new wangEditor('textarea1');

     // 自定义菜单
    editor.config.menus = [
        'emotion'
     ];

    editor.create();
</script>
</html>