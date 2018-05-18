<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/index/index.css">
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
	<div id="main">
		<div class="left_content"><!----右边内容块---->
			<div id="main_title">
				<div class="name">我的随笔</div>
			</div>
			<!--
			<div id="main_search">
				<form action="http://www.xnote.cn/post/search/" method="post" name="frmSearch" id="frmSearch" onsubmit="return chkSearch(this);">
					<input id="query" name="query" type="text" value="" class="search_input">
					<input id="submit" type="submit" value="搜索" class="search_button">
				</form>			
			</div>
			-->
			<div id="quick" class="show" style="display:block;">
				<form method="post" name="frmPost" id="frmPost">
					<p style=" margin-bottom:5px;">快速记录简短的文字</p>
					<p>
						<textarea name="content" id="content" onkeyup="fixContentLen(&#39;content&#39;,1000);"></textarea><br>
					</p>
					<div id="content_tips" style="margin:3px;">你还可以输入<b>1000</b>字!</div>
					<div id="quick_buttons" style="margin-top:8px;">
						<input type="button" value="保存" onclick="save_message();" class="btn btn_def" onmouseout="this.className=&#39;btn btn_def&#39;" onmouseover="this.className=&#39;btn btn_def_hv&#39;">
					</div>
					<div id="quick_saveing" style="margin-top:8px; color:#999;" class="hide">
						<img src="/Notebook/Home/Public/IMAGES/saveing.16.gif" align="absmiddle">&nbsp;保存中...
					</div>
				</form>
			</div>
			
			<ul id="post_list" class="list">
				<?php if(is_array($info)): foreach($info as $key=>$vo): ?><li id="item_<?php echo ($vo["id"]); ?>" key="<?php echo ($vo["id"]); ?>">
					<div class="index"><?php echo ($vo["num"]); ?></div>
					<div class="content" id="show_<?php echo ($vo["id"]); ?>">
						<pre id="content_<?php echo ($vo["id"]); ?>"><?php echo ($vo["data"]); ?></pre>
						<span class="time"><?php echo ($vo["addtime_show"]); ?></span>
					</div>
					<div class="edit" id="edit_<?php echo ($vo["id"]); ?>"></div>
					<div class="action" id="act_<?php echo ($vo["id"]); ?>"></div>
				</li><?php endforeach; endif; ?>
			</ul>
			<?php echo ($pageinfo); ?>
		</div>
		<div id="act_template"><!--仅仅作为隐藏的模板-->
	    	<a href="javascript:void(0);" onclick="edit([ID]);" title="编辑随笔">编辑</a>&nbsp;
	        <a href="javascript:void(0);" onclick="del([ID]);" title="删除随笔">删除</a>
		</div>
		<div id="act_edit"><!--仅仅作为隐藏的模板-->
			<form method="post" name="frmEdit" id="frmEdit_[ID]">
		    	<textarea name="content" id="edit_content_[ID]"></textarea>
		    	<input name="id" type="hidden" value="" id="edit_id_[ID]">
		    </form>
		    <div class="edit_btn">
		    <input type="button" value="保存" class="btn btn_def" onmouseout="this.className=&#39;btn btn_def&#39;" onmouseover="this.className=&#39;btn btn_def_hv&#39;" onclick="act_update([ID]);">
		    <input type="button" value="取消" class="btn btn_gray" onmouseout="this.className=&#39;btn btn_gray&#39;" onmouseover="this.className=&#39;btn btn_gray_hv&#39;" onclick="act_cancel([ID]);">
		    </div>
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
	var uid=<?php echo ($uid); ?>;
	var content = $('#content').val();
	if(content == ''){
		alert('请输入随笔内容!');
		$('#content').focus();
		return false;
	}
	$('#quick_buttons').hide();
	$('#quick_saveing').show();

	$.ajax({
		url:"<?php echo U('Index/save_message');?>",
		type:'post',
		data:{uid:uid,content:content},
		async:false,
		dataType: "json",
		success:function(msg){
			if(msg.error == 0){
				window.location.reload();
			}else{
				alert(msg.error);
				$('#quick_saveing').hide();
				$('#quick_buttons').show();
				return false;
			}
		},
		error:function(){
		}
	});
}
function act_update(id){
	var content = $('#edit_content_' + id).val();
	if(content == ''){
		alert('请输入随笔内容!');
		$('#edit_content_' + id).focus();
		return false;
	}
	$('#edit_id_' + id).val(id);
	url="<?php echo U('index/act_update');?>";
	$.post(url,$("#frmEdit_" + id).serialize(),
		function(data){
			if(data ==1){
				alert('修改成功!');
				window.location.reload();
			}else{
				alert('修改失败，请稍后重试!');
				window.location.reload();
			}
	},
	"text");
}
function del(id){
	var uid=<?php echo ($uid); ?>;
	if(confirm('确定要删除吗?')){
		url="<?php echo U('index/act_del');?>";
		$.post(url,{id:id},
			function(data){
				if(data ==1){
					alert('删除成功!');
					window.location.reload();
				}else{
					alert('删除失败，请稍后重试!');
					window.location.reload();
				}
		},
		"text");
	}
}

</script>

</html>