<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Notepad/index.css">
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/SetInfo/main.css">
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/SetInfo/thickbox.css">
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<script src="/Notebook/Home/Public/JS/Notepad/index.js"></script>
<script src="/Public/My97DatePicker/WdatePicker.js"></script>
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
	<div id="main" class="member">
		
    <div id="left">
        <div class="member_left">
            <img src="/Public<?php echo ($logo); ?>" align="absmiddle" class="member_logo_b" style="width:150px;height:150px;">
            <dl style=" width:156px;text-align:left;margin:10px 0 20px 0; line-height:20px;" class="std">
            <dt>账号：</dt>
            <dd class="b"><?php echo ($username); ?></dd>
            </dl>
        </div> 
    </div>
	
	<div id="right">

        <h1>设置</h1>
        <ul class="member_menu">
            <li class="current"><a href="/index.php?s=/Home/SetInfo/index">个人资料</a></li>
            <li><a href="/index.php?s=/Home/SetInfo/logo">修改头像</a></li>        
            <li><a href="/index.php?s=/Home/SetInfo/password">修改密码</a></li>
        </ul>
        
		<form method="post" name="frmMain" id="frmMain" action="/index.php?s=/Home/SetInfo/save_info" onsubmit="return checkinfo()">
        <ul class="preferences">
            
        	<li>
            	<div class="caption">姓名：</div>
                <div class="content">
                	<div class="input"><input type="text" name="username" id="username" value="<?php echo ($username); ?>" size="10" maxlength="20"><span style="font-size:12px;color:red;">5-20个字符，可以使用字母、数字</span></div>
                </div>
            </li>
            
            
        	<li>
            	<div class="caption">性别：</div>
                <div class="content">
                	<div class="input"><label for="gender_male" style="height:22px;">
					<input type="radio" name="sex" value="1" class="chk" id="sex" <?php if($sex == 1): ?>checked="checked"<?php endif; ?> />
					男 </label>
					<label for="gender_female" style="height:22px;"><input type="radio" name="sex" value="2" class="chk" id="sex"  <?php if($sex == 2): ?>checked="checked"<?php endif; ?> />
					女</label></div>
                </div>
            </li>
            
            
        	<li>
            	<div class="caption">生日：</div>
                <div class="content">
                	<div class="input">
                    <input type="text" name="birthday" id="birthday" value="<?php echo ($birthday); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})">
                    <div class="tips"> “生日”和“Email”将是您找回账号的重要凭证</div>
                    
                </div>
            </li>

            <li>
                <div class="caption">电子邮箱：</div>
                <div class="content">
                    <div class="input"><input type="text" name="email" id="email" value="<?php echo ($email); ?>" size="50" maxlength="50"></div>
                    <div class="tips">您常用的电子邮箱</div>
                </div>
            </li>

		</ul>        
        

        <div id="action" class="preferences">
            <input id="btnSave" type="submit" value="提交" class="btn btn_def" onmouseout="this.className=&#39;btn btn_def&#39;" onmouseover="this.className=&#39;btn btn_def_hv&#39;">
            <input id="btnBack" type="button" value="返回" class="btn btn_gray" onmouseout="this.className=&#39;btn btn_gray&#39;" onmouseover="this.className=&#39;btn btn_gray_hv&#39;" onclick="history.back();">
        </div>
			  
		</form>
	</div>
	
	<div class="clear"></div>

	</div>


	<!--隐藏-->
	<div id="act_template" style="display:none;">
	        <a href="/index.php?s=/Home/Notepad/edit/id/[ID]/" title="编辑">编辑</a>&nbsp;
	        <a href="javascript:void(0);" onclick="del([ID]);">删除</a>&nbsp;
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
function ismobile_email(val)    //判断电话，邮箱格式是否正确
{
    var flag=true;
    var patternphone=/^1[358][0123456789]\d{8}$/;
    var patternemail=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;

    if(patternemail.test(val)){
        flag=true;
    }
    else if(patternphone.test(val)){
        flag=true;
    }
    else
    {
        flag=false;
    }
    return flag;    
}
function checkinfo(){
    var username=document.getElementById("username").value;
    var email=document.getElementById("email").value;
    var sex=document.getElementById("sex").value;
    var birthday=document.getElementById("birthday").value;

    if(username == ''){
        alert('请填写姓名');
        return false;
    }
    if(sex == ''){
        alert('请选择性别');
        return false;
    }
    if(birthday == ''){
        alert('请填写生日');
        return false;
    }
    if(email == ''){
        alert('请填写邮箱');
        return false;
    }
    if(ismobile_email(email)==false){
        alert('请输入正确的邮箱');
        return false;
    }
    if(username.length<5 || username.length>20){
        alert('请输入正确长度的姓名');
        return false;
    }

}
</script>
</html>