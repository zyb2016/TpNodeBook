<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Notepad/index.css">
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<script src="/Notebook/Home/Public/JS/Notepad/index.js"></script>
<script src="/Data/Ueditor/ueditor.config.js"></script>
<script src="/Data/Ueditor/ueditor.all.min.js"></script>

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
	<div id="main">
		<div class="left_content"><!----右边内容块---->
			<div id="main_title">
				<div class="name">我的笔记本</div>
			</div>
			<div>
				<div style="float:left;margin-top:10px;">标题：</div>
				<div style="float:left;margin-top:8px;">
					<input style="width:320px" name="title" type="text" id="title" size="30" value="">
					&nbsp;&nbsp;&nbsp;<span style="color:red;">(标题长度不大于25个字)</span>
				</div>
			</div>
			<script id="editor" type="text/plain" style="width:650px;height:400px;margin-top:35px;"></script>
			<div style="margin-top:10px;margin-left:550px;">
				<div style="float:left;margin-top:2px;">
					<input name="showtag" id="showtag" type="checkbox" value="1" />公开
				</div>
				<div style="float:left;margin-left:20px;">
					<button onclick="getContent()">保 存</button>
				</div>
    		</div>
		</div>

		<div class="right_content" ><!--右边新闻块-->
			<h2  >互联网新闻</h2><br/>
			<h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595421/' target='_blank'>免费下载的Windows镜像为何成为15个月牢狱之灾的犯罪证明</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595412/' target='_blank'>李彦宏夫妇向北大捐赠6.6亿 刘强东夫妇向清华捐赠2亿元</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595361/' target='_blank'>小米IPO前夕高管团队大调整：两名联合创始人退休</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595355/' target='_blank'>有道翻译官的实景AR翻译是什么？居然秒杀Google</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595330/' target='_blank'>香港大学成功研发预防和清除艾滋病病毒新药物</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595309/' target='_blank'>微软发布第三财季财报：净利润同比增长35%</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595296/' target='_blank'>谷歌新系统Fuchsia源码现身AOSP 开发者发现其支持ART运行环境</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595245/' target='_blank'>倪光南撰文：有件事，比芯片被人卡脖子更危险</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595200/' target='_blank'>腾讯控股三个月市值蒸发6500亿 马化腾“闪退”华人首富</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595156/' target='_blank'>雷军：小米硬件综合净利率永远不超5％！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595143/' target='_blank'>苦大仇深的“中国芯”，不妨学一学有趣的树莓派</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595087/' target='_blank'>我的快递，凭什么不能给我送到家！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595102/' target='_blank'>倪光南回应方舟CPU失败论：企业失败不等于技术失败</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595103/' target='_blank'>清华大学突破纪录：首次实现25个量子接口间量子纠缠</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595061/' target='_blank'>定向免流量套餐用着爽，但背后的“坑”你可能不知道</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595059/' target='_blank'>你在微信群侃大山，有人却用微信群发大财</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595047/' target='_blank'>马云的三观</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/595043/' target='_blank'>美国科技强大的全部秘密</a></h4>
		</div>
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

<script type="text/javascript">
	var content='';
  	window.UEDITOR_HOME_URL ="/Data/Ueditor/";//指出ueditor的存放路径
  	window.onload=function(){
		var ue =UE.getEditor('editor');//要传入一个ID才能显示编辑器，即textarea中的id
		ue.addListener("ready", function () {
	    // editor准备好之后才可以使用
	    ue.setContent(content);
	});
 }
function getContent() {
	var title=$('#title').val();
	var showtag = 0; 
	var content=UE.getEditor('editor').getContent();
	if(title == ''){
		alert('标题不能为空！');
		return false;
	}
	if(title.length>45){
		alert('标题长度不能大于25个字！111');
		return false;
	}
	if(content.length>15000){
		alert('内容长度不能大于5000！');
		return false;
	}
	
	if($('#showtag')[0].checked){
		showtag=$('#showtag')[0].value;
	}

	$.ajax({
		url:"<?php echo U('Notepad/add_info');?>",
		type:'post',
		data:{title:title,content:content,showtag:showtag},
		async:false,
		success:function(msg){
			if(msg == 1){
				window.location="<?php echo U('Notepad/index');?>";
			}else if(msg==2){
				alert('标题长度不能大于25个字！');
				return false;
			}else if(msg==3){
				alert('内容长度不能大于5000！');
				return false;
			}else if(msg==4){
				alert('保持失败，请重试');
				return false;
			}else if(msg==5){
				alert('请重新登录');
				window.location.reload();
			}
		},
		error:function(){
		}
	});

}
</script>

</html>