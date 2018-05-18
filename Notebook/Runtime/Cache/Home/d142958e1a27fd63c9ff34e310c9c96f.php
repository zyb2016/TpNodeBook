<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Visitor/index.css">
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<script src="/Notebook/Home/Public/JS/index/index.js"></script>
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

	<!-----Very Nice---->
	<div id="main" >
		<div class="left_content"><!----右边内容块---->
			<div id="main_title">
				<div class="name">首页</div>
			</div>

			<div id="quick" >
				<?php if(is_array($info)): foreach($info as $key=>$vo): ?><div class="conent_left">
						<div class="conent_left_level1">
								<?php echo ($vo["num"]); ?>)&nbsp;&nbsp;<?php echo ($vo["datetime"]); ?>&nbsp;&nbsp;<span style="color:#F55"><?php echo ($vo["ip"]); ?></span>&nbsp;&nbsp;<?php echo ($vo["address"]); ?>
						</div>
						<div class="conent_left_level2">
							&nbsp;<?php echo ($vo["ua"]); ?>
						</div>
					</div><?php endforeach; endif; ?>
				
			</div>
			

			<?php echo ($pageinfo); ?>
		</div>


		<div class="right_content" ><!--右边新闻块-->
		<h2  >互联网新闻</h2><br/>
		<h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596924/' target='_blank'>刘润：我很怕写这篇文章，因为评价新事物是有风险</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596899/' target='_blank'>中国首枚民营自研商用亚轨道火箭“重庆两江之星”首飞成功</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596894/' target='_blank'>温故一九九二：它就这样过去了，它值得我们怀念</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596859/' target='_blank'>柳传志再度发声：这是一起动机极为恶劣的阴谋</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596815/' target='_blank'>老罗看了会流泪，这才是昨晚应该刷屏的生产力工具</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596816/' target='_blank'>阿里巴巴加入JCP执行委员会</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596813/' target='_blank'>一场重新定义得太早的发布会：你花￥9999就是为了买一块大屏幕？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596797/' target='_blank'>中国芯酸往事：熬过多少苦难，才能实现追赶和超越？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596776/' target='_blank'>坚果R1和TNT电脑的消息都在这里：老罗很兴奋，但我很失望</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596761/' target='_blank'>锤子科技480万门票收入捐赠给OpenSSL与OpenBSD</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596694/' target='_blank'>坚果R1手机和TNT电脑发布：罗永浩说这是全世界最好看的白色手机</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596749/' target='_blank'>“不在服务区”成为历史！中国自主卫星电话正式放号</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596729/' target='_blank'>300多位学者联名上书，员工离职，会让谷歌停止与美国国防部合作吗？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596728/' target='_blank'>外国程序员发帖求助：快四十岁了，不知道以后该怎么办</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596687/' target='_blank'>火星将迎来第一架无人机，震撼的上帝视角要来了</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596657/' target='_blank'>1994年的马云老师振聋发聩：四六级英语统考不足取</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596626/' target='_blank'>特斯拉（上海）获营业执照注册资本1亿元 从事电动车进出口业务</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596620/' target='_blank'>乐视业绩说明会全程实录：将切实解决公司的实际债务（附全文）</a></h4>
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

<script>


</script>

</html>