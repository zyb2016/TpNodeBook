<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Notebook</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="alternate" type="application/vnd.wap.xhtml+xml" media="handheld" href="target"/>
<link rel="icon" type="image/x-icon" href="/Public/home_uploads/bitbug_favicon_6464.ico"/>
<script src="/Notebook/Home/Public/JS/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Login/Login.css">
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Login/main.css">
<link rel="stylesheet" href="/Notebook/Home/Public/CSS/Login/thickbox.css">
</head>

<body class="body_bg">
<!-- Page Header -->
<div id="header">
	<div id="header_top">       		
		<div id="header_title">
			<h1 class="header">我的记事本</h1>
			<div class="description">
				竹杖芒鞋轻胜马，谁怕？一蓑烟雨任平生
			</div>
		</div>
		<div id="header_slogan" style="text-align:right;">
			免费、安全的记事本！ 
        </div>
		<div class="clear"></div>
	</div>
	
		
	<div id="header_menu">
		<div class="left">
			<div class="left" style="line-height:16px; margin-top:3px;">
				<span style="color:#ff6600">这是我的记事本！</span>
            </div>      
		</div>
	</div>
</div>

<div id="index_main">
    <div id="index_left">
    
        <div id="logo_main">
        	<img src="/Notebook/Home/Public/IMAGES/meng.jpg" style="width: 200px;height: 200px;" alt="xNote云记事本logo">
        </div>
    </div>


    <div id="index_right">
    
        <div>
            <br>
            <span>手机版：</span>
            <br>
            <br>
        </div>
            
        <div style="margin:20px 0; font-size:15px;">
           <form method="post" name="frmLogin" id="frmLogin" action="/index.php?s=/Home/Login/login">
           
                <div style="margin:10px 0;">
                    <label>用户名</label>
                    <input name="username" type="text" id="username" value="" maxlength="20" class="login">
                </div>
                
                <div style="margin:10px 0;">
                    <label>密　码</label>
                    <input name="password" type="password" id="password" value="" maxlength="30" class="login">
                    &nbsp;&nbsp;
                    <a href='<?php echo U('FindPassword/index');?>' >忘记密码了?</a>
                </div>
                
                <div style="margin:10px 0; padding-left:40px;">
                    <div id="buttons" style="margin-top:10px;">
                        <input id="btnLogin" type="submit" value="登录" class="btn btn_def" onmouseout="this.className=&#39;btn btn_def&#39;" onmouseover="this.className=&#39;btn btn_def_hv&#39;">
                    </div>
                </div>
                <div style="margin:15px 0; padding-left:40px;">
                </div>
            </form>	
        </div>
        
        <div>
            还没有账号？<a href="<?php echo U('reg/index');?>" class="uline">立即注册</a>
        </div>	
        <br>
    
    </div>

</div>
</body>

</html>