<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Notepad/view.css">
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<script src="/Notebook/Home/Public/JS/Notepad/index.js"></script>

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
				<div style="float: right;font-weight: normal;margin-top: 10px;">
					<!--<a href="/index.php?s=/Home/Notepad/edit/id/<?php echo ($id); ?>/" ><span style="color:#001ac4;font-size: 13px;font-weight: blod;">+编辑</span></a>-->
				</div>
				<div style="float:left;margin-top:8px;">
					<input style="width:320px" name="title" type="text" id="title" size="30"  readonly="readonly" value="<?php echo ($title); ?>">
				</div>
			</div>
			<div id="note_content"><?php echo ($content); ?></div>

		</div>

		<div class="right_content" ><!--右边新闻块-->
			<h2  >互联网新闻</h2><br/>
			<h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597316/' target='_blank'>怎样高效实现增长？这里有50个经典的增长黑客策略</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597268/' target='_blank'>Google让AI帮你给餐厅打电话订位子做预约，但这事儿，微软不服！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597233/' target='_blank'>这个赌博网站的骚，闪瞎了我的腰......</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597218/' target='_blank'>人类历史首次！中国人让月球背面有了信号（最简解读看完秒懂）</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597187/' target='_blank'>RNG斩获《英雄联盟》MSI 2018总冠军！3：1击败韩国KZ</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597181/' target='_blank'>锤子钱晨往事</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597135/' target='_blank'>柯洁首度还原对战AlphaGo幕后故事：我的汗水没打折扣</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597100/' target='_blank'>李均：我眼中的黑客精神</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597124/' target='_blank'>ofo生死局：陷资金困境，拿什么续命？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597109/' target='_blank'>嫦娥四号任务中继星成功发射 将搭建地月&quot;鹊桥&quot;</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597107/' target='_blank'>任正非签发内部文：警惕“华为中年危机”！</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597101/' target='_blank'>郭台铭：我的孩子若想钱多事少离家近 隔天就打断他腿</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597051/' target='_blank'>央视专访董明珠：哪怕投资500亿 格力也要把芯片研究成功</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597044/' target='_blank'>陆奇交还百度COO权杖，功未成身已退</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/597007/' target='_blank'>张昭：挣脱乐视，走出至暗时刻</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596969/' target='_blank'>柳传志哽噎背后：以一场投票来讨伐企业不爱国有多荒谬</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596926/' target='_blank'>一个华为老兵解读联想的鸡毛信：联想5G投票错了吗？</a></h4><h4 class='news_href'><a style='font-size:14px;line-height:30px;' href='https://news.cnblogs.com/n/596924/' target='_blank'>刘润：我很怕写这篇文章，因为评价新事物是有风险</a></h4>
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

function getContent() {
	var id='<?php echo ($id); ?>';
	var title=$('#title').val();
	var content=UE.getEditor('editor').getContent();
	if(title == ''){
		alert('标题不能为空！');
		return false;
	}
	if(title.length>15){
		alert('标题长度不能大于15个字！');
		return false;
	}
	if(content.length>5000){
		alert('内容长度不能大于5000！');
		return false;
	}

	$.ajax({
		url:"<?php echo U('Notepad/update_info');?>",
		type:'post',
		data:{id:id,title:title,content:content},
		async:false,
		success:function(msg){
			if(msg == 1){
				window.location="<?php echo U('Notepad/index');?>";
			}else if(msg==2){
				alert('标题长度不能大于15个字！');
				return false;
			}else if(msg==3){
				alert('内容长度不能大于5000！');
				return false;
			}else if(msg==4){
				alert('保持失败，请重试');
				return false;
			}
		},
		error:function(){
		}
	});

}
</script>

</html>