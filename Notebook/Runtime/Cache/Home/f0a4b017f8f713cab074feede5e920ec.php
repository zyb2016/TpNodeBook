<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/MessageBoard/index.css">
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
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

	<!--Very Nice-->
	<div id="main">
		<div class="left_content"><!----右边内容块---->
			<div id="main_title">
				<div class="name">帮助我们提高</div>
			</div>
			<div id="quick" class="show" style="display:block;">
				<div class="o b" style="margin-left:65px;">你的建议就是我们的前进方向!</div>
	            <form id="frmMain">
	                <dl class="std quick">        
	                    <dt>您的名字：</dt>
	                    <dd><input name="nickname" id="nickname" type="text" value="" size="25" maxlength="20"class="text" style="width:160px;" /></dd>
	                    <dt>您的看法：</dt>
	                    <dd><textarea name="content" id="content" cols="80" rows="7" style="width:520px;height:80px;" onkeyup="fixContentLen(&#39;content&#39;,500);"></textarea></dd>
	                    <dt></dt>
	                    <dd><div id="content_tips" style="margin:3px;">你还可以输入<b>500</b>字!</div></dd></dd>                
	                    <dt></dt>
	                    <dd>
	                        <input id="uid" name="uid" type="hidden" value="<?php echo ($uid); ?>" />
	                        <input id="btnSave" type="button" value="提交" onclick="save_message();" class="btn btn_def" onmouseout="this.className='btn btn_def'" onmouseover="this.className='btn btn_def_hv'" />
	                    </dd>
	                </dl>
	            </form>  
			</div>
			
			<ul id="post_list" class="list">
				<?php if(is_array($info)): foreach($info as $key=>$vo): ?><li>
					<div class="index"><?php echo ($vo["num"]); ?></div>
					
					<div class="content">
						<div class="title"><?php echo ($vo["nickname"]); ?></div>
						<pre><?php echo ($vo["data"]); ?></pre>
						<span class="time"><?php echo ($vo["createtime_show"]); ?></span>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
			<?php echo ($pageinfo); ?>
		</div>
		
		<div class="right_content"><!----右边新闻块---->
		<h2  >互联网新闻</h2><br/>
		<h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596749/' target='_blank'>“不在服务区”成为历史！中国自主卫星电话正式放号</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596728/' target='_blank'>外国程序员发帖求助：快四十岁了，不知道以后该怎么办</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596687/' target='_blank'>火星将迎来第一架无人机，震撼的上帝视角要来了</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596657/' target='_blank'>1994年的马云老师振聋发聩：四六级英语统考不足取</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596626/' target='_blank'>特斯拉（上海）获营业执照注册资本1亿元 从事电动车进出口业务</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596620/' target='_blank'>乐视业绩说明会全程实录：将切实解决公司的实际债务（附全文）</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596598/' target='_blank'>安全不了的Android，想不明白的Google</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596590/' target='_blank'>腾讯应用宝推出“长辈关怀” 功能：双屏同步操作</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596568/' target='_blank'>中美大国利益博弈：中兴危机或重现生机</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596550/' target='_blank'>母亲节马云感恩母校：老师的理想主义成就阿里巴巴</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596496/' target='_blank'>SpaceX成功首发终极版猎鹰9号火箭 马斯克称其最可靠</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596450/' target='_blank'>腾讯围棋AI技术PhoenixGo正式开源</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596409/' target='_blank'>小米造富神话虚实：员工平均年薪16万，470亿元期权咋分？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596382/' target='_blank'>微软开源ML.NET跨平台机器学习框架，AI普及又向前跨进一步</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596310/' target='_blank'>百度软件中心版putty被曝恶意捆绑软件</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596306/' target='_blank'>云联惠总部被封 头目被抓：3300亿特级骗局正式崩盘！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596281/' target='_blank'>不到三月市值蒸发超千亿，拼多多成了京东的大麻烦</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596247/' target='_blank'>.NET Core 3新特性公布：支持Windows桌面应用</a></h4>
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
function fixContentLen(id,intMax){
	var txt = document.getElementById(id);
	var tips = document.getElementById(id + '_tips');
	
	var str  = txt.value;
	var len = intMax - str.length;
	if(len <= 0){
		txt.value = str.substring(0,intMax);
		tips.innerHTML = '<span class=o>你还可以输入<b>0</b>个字!</span>';		
		return false;
	}else{
		tips.innerHTML = '你还可以输入<b>' + len + '</b>个字!';		
	}
	return true;
}
function save_message(){
	var nickname=$('#nickname').val();
	if(nickname == ''){
		alert('请输入名字!');
		$('#nickname').focus();
		return false;
	}else if(nickname.length > 10){
		alert('名字要小于10个字!');
		$('#nickname').focus();
		return false;
	}
	var content = $('#content').val();
	if(content == ''){
		alert('请输入您的看法!');
		$('#content').focus();
		return false;
	}else if(content.length > 500){
		alert('内容要小于500个字!');
		$('#content').focus();
		return false;
	}

	url="<?php echo U('save_message');?>";
	$.post(url,$("#frmMain").serialize(),
		function(data){
		if(data.error==0){
			alert('提交成功');
			window.location.reload();
		}else{
			alert(data.reason);
			window.location.reload();
		}
	},
	"json");

}
</script>

</html>