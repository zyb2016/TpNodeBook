<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Board/index.css">
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
</head>

<body class="body_bg">
	<div id="header">
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
	<div id="header_top">
		<div id="header_logo">
		<a href="#" style="display:bolck"><img src="/Public<?php echo ($logo); ?>" align="absmiddle" class="user_logo" width="56" height="56" ></a>
		</div>
			
		<div id="header_title">
			<h1 class="header">My网络记事本</h1>
			<div class="description">
				勤能补拙，慎独
			</div>
		</div>
		<div id="header_slogan" style="text-align:right;">
			安全记事本<br>
		</div>	
		<div class="clear"></div>
	</div>
	
	<div id="header_menu"><!--列表-->
		<div class="left">
			<ul class="menu_list">
				<li id="homepage" class="current"><a href="/index.php?s=/Home/Homepage/index" target="_parent">首页</a></li>
				<li id="shuibi" ><a href="/index.php?s=/Home/Index/index" target="_parent">随笔</a><em>&nbsp;</em></li>
				<li id="jishiben" ><a href="/index.php?s=/Home/Notepad/index" target="_parent">记事本</a></li>
				<li id="helpus" ><a href="/index.php?s=/Home/MessageBoard/index" target="_parent">帮助我们提高</a></li>
			</ul>       
		</div>
		
		<div class="right">
			<ul class="menu" style="line-height:16px; margin-top:3px;">
				<li class="first"><?php echo ($username); ?> 你好!</li>
				<li><a href="/index.php?s=/Home/SetInfo/index" target="_parent">设置</a></li>               
				<li><a href="<?php echo U('Login/signout');?>" target="_parent">退出</a></li>
			</ul>
		</div>
	</div>
</div>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/public/header.css">
<script type="text/javascript">
	var type='<?php echo ($type); ?>';
	$(function(){
		$('.menu_list li').removeClass('current');
		$('#'+type).addClass('current');
	});
</script>

	
	<div id="main">
		<div class="left_content"><!----右边内容块---->
			<div id="main_title">
				<div class="name"></div>
			</div>
			<div class="clear"></div>
			<div class="note_content">
				<?php if($content == 'AboutUs' ): ?><p>My网络记事本是我和风波及朋友们建立的，</p>
					<p>旨在为大家提供一个简洁明快的笔记网站，</p>
					<p>我们希望能给大家带来方便，这就是我们的动力。。。</p>
				<?php elseif($content == 'Advertisement' ): ?>
					<p>广告及商务合作</p>
 					<br/>
					<p>联系人：zyb</p>
					<p>邮箱：2995334125@qq.com</p>
					<p>联系人：fengbo</p>
					<p>邮箱：fengbohello@foxmail.com</p>
				<?php elseif($content == 'Problem' ): ?>
					<p>如果有问题，欢迎给我们留言</p>
				<?php elseif($content == 'Contact' ): ?>
 					<br/>
					<p>QQ交流群：324863152</p>
					<br/>
					<p>邮箱：fengbohello@foxmail.com</p>
					<p>邮箱：2995334125@qq.com</p><?php endif; ?>
			</div>
		</div>
		
		<div class="right_content"><!----右边新闻块---->
		<h2  >互联网新闻</h2><br/>
		<h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596382/' target='_blank'>微软开源ML.NET跨平台机器学习框架，AI普及又向前跨进一步</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596310/' target='_blank'>百度软件中心版putty被曝恶意捆绑软件</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596306/' target='_blank'>云联惠总部被封 头目被抓：3300亿特级骗局正式崩盘！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596281/' target='_blank'>不到三月市值蒸发超千亿，拼多多成了京东的大麻烦</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596247/' target='_blank'>.NET Core 3新特性公布：支持Windows桌面应用</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596204/' target='_blank'>Google Assistant冒充你打电话，接你下茬儿，替你回邮件...</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596203/' target='_blank'>微软发布了一台能直播写代码的智能会议电话机，太虐人了！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596177/' target='_blank'>微软称它最成功的服务器产品运行在 Linux 上</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596130/' target='_blank'>大数据“加持”下的精准骗局</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596099/' target='_blank'>VS 2017 15.7和15.8 Preview 1发布，.NET Core 2.1RC1发布</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596091/' target='_blank'>Build 2018大会梳理：Azure、AI、Microsoft 365、开发等</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596089/' target='_blank'>Build 2018展示Visual Studio新功能：跨系统云编程、智能代码</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596060/' target='_blank'>R和Python大神携手：让使用不同语言的人更轻松协作</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596038/' target='_blank'>俞敏洪：致新员工的5点心得以及好公司的4个要素</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595996/' target='_blank'>微软开发者大会今晚开幕，你期待什么新产品？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595964/' target='_blank'>谁说腾讯没有梦想？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595932/' target='_blank'>请回答，1968</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595933/' target='_blank'>腾讯没有梦想？马化腾：我的理想是如何做出最好的产品，不是赚钱</a></h4>
		</div>
	</div>
	<div id="footer">
	<div class="footer-links">
		<a href="/index.php?s=/Home/Board/AboutUs">关于我们</a>
		<a href="/index.php?s=/Home/Board/Advertisement">广告业务</a>
		<a href="/index.php?s=/Home/Board/Problem">常见问题</a>
		<a href="/index.php?s=/Home/Board/Contact">联系我们</a>
	</div>
	<div class="clear"></div>

	<div class="copyright">
	©2016 <a href="http://www.miibeian.gov.cn" target="_blank" style="color:#898989;font-size:11px;">京ICP备15011784号</a>
	</div>
</div>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/public/footer.css">
</body>
</html>