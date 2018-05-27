<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta charset="UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Reg/Reg.css">
</head>

	<body class="body_bg">
		<center>
			<div id="container">
				<h3>注册账号</h3>
				<form action="#" method="post">
				<table width='430' border='0' name="form">
					<tr>
						<td>姓名</td>
						<td><input type='text' name='username' id="username" onblur="check_username()"/>
							<span id="judge_username" style="color:red;font-size:8px;display:none;">(*已存在,请重新输入)</span>
						</td>

					</tr>
					<tr><td colspan='2' align='center' style="font-size:12px;color:red;">5-20个字符，可以使用字母、数字</td></tr>
					<!--
					<tr>
						<td>手机号</td>
						<td><input type='text' name='telephone' id="telephone" /></td>
					</tr>
					-->
					<tr><td colspan='2' align='center'>&nbsp;&nbsp;</td></tr>
					<tr>
						<td>email</td>
						<td><input type='text' name='email' id="email" /></td>
					</tr>
					<tr><td colspan='2' align='center' style="font-size:12px;color:red;">Email 将是您找回账号的重要凭证</td>
					</tr>
					
					<tr><td colspan='2' align='center'>&nbsp;&nbsp;</td></tr>
					<tr>
						<td>登录密码：</td>
						<td><input type='password' name='password' id="password" /></td>
					</tr>
					<tr>
						<td colspan='2' align='center' style="font-size:12px;color:red;">必须是6位以上的数字和字母，区分大小写
						</td>
					</tr>
					<tr>
						<td>确认密码：</td>
						<td><input type='password' name='repassword' id="repassword" /></td>
					</tr>
					<tr><td colspan='2' align='center'>&nbsp;&nbsp;</td></tr>
					<tr>
						<td>验证码：</td>
						<td><input type='text' name='verifi_code' id="verifi_code" />
						</td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
						<img src="/index.php?s=/Home/Reg/showVerify" width="150" onclick="if(this.src !=this.src+'?'+Math.random()) this.src=this.src+'?'+Math.random()" />
						</td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
							&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
							<input type='button' name="sub" onclick="sub_message(this.form)" value='立 即 注 册'/>
						</td>
					</tr>
				</table>
				</form>
		</center>
	</body>

<script>
function ismobile_email(val)	//判断电话，邮箱格式是否正确
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

function check_username(){
	var username=document.getElementById("username").value;
	$.ajax({
		async:false,        //同步
		type:'get',
		url:"/index.php?s=/Home/Reg/regajaxuser",
		data:{username:username},
		success:function(msg){
			if(msg){	//有相同的姓名存在
				$('#judge_username').css('display','block');
			}else{
				$('#judge_username').css('display','none');
			}
		}
	});
}

function sub_message(formObj){
	var username=document.getElementById("username").value;
	//var telephone=document.getElementById("telephone").value;
	var email=document.getElementById("email").value;
	var password=document.getElementById("password").value;
	var repassword=document.getElementById("repassword").value;
	var verifi_code=document.getElementById("verifi_code").value;
	if(username == ''){
		alert('请填写姓名');
		return;
	}
	if(email == ''){
		alert('请填写邮箱');
		return;
	}
	if(password == '' || repassword==''){
		alert('请填写密码');
		return;
	}
	if(password.length < 6){
		alert('密码至少6个字符');
		return false;
	}
	if(verifi_code == ''){
		alert('请填写验证码');
		return;
	}
	if(password != repassword){
		alert('密码重复错误，请重新输入');
		return;
	}
/*
	if(ismobile_email(telephone)==false){
		alert('请输入正确的手机号');
		return;
	}
	*/
	if(ismobile_email(email)==false){
		alert('请输入正确的邮箱');
		return;
	}
	if(username.length<5 || username.length>20){
		alert('请输入正确长度的姓名');
		return;
	}

	formObj.action="<?php echo U('regist');?>";
	formObj.submit();
}
</script>
</html>