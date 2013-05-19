<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AV Arcade Admin</title>
<style>
body {
	background: #e3e3e3 url(images/login_bg.png);
}
.form_textbox {
	background: url(images/login_textbox.png);
	width: 302px;
	height: 37px;
	border: 0px;
	padding: 0 0 0 7px;
	font-size: 16px;
}
.box {
	margin: auto;
	background: #ededed; 
	width:350px; 
	height:210px;  
	text-align:center; 
	padding-top:10px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	background-image: url(images/login_box.png);
	border: 1px solid #cccccc;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	color: #363636;
}
.button {
	text-decoration: none;
	font-size: 14px;
	padding: 0px 20px 2px 20px;
	cursor: pointer;
	border: 1px solid #b8b8b8;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	box-sizing: content-box;
	background-color: #FFF;
	background-image:url(images/login_button.png);
	background-position: bottom;
	height: 26px;
}
.button:hover {
	border-color: #737373;
}
.footer {
	font-family: Helvetica;
	font-size: 12px;
	text-align: center;
	margin-top: 5px;
	color: #6a6a6a;
	text-shadow: #c9c9c9 0px 1px 0px;
}
.footer a {
	color: #4c4c4c;
	text-decoration: none;
}
.footer a:hover {
	text-decoration: underline;
}
.form_text {
	font-size: 14px;
	text-align: left;
	color: #656565;
	font-family: Helvetica;
	margin-top: 8px;
	padding-left: 20px;
}
.kmli {
	font-family: Helvetica;
	text-align: left;
	font-size: 14px;
	padding-left: 20px;
	margin-bottom: 20px;
	margin-top: 5px;
}
.login_logo {
	text-align: center;
	margin-top:100px;
}
</style>
</head>

<body>

<div class="login_logo"><img src="images/login_logo.png" alt="login_logo" width="58" height="42" /></div>
<div class="box">
<form name="form1" method="post" target="_self" action="<?php echo $setting['site_url'];?>/login.php?done=1&action=admin">
  <div class="form_text">Username</div>
  <input name="username" type="text" id="username" class="form_textbox"><br />
  <div class="form_text">Password</div>
    <input name="password" type="password" id="password" class="form_textbox"><br />
    <div class="kmli"><label><input type="checkbox" name="remember" id="remember" checked="checked" /> Keep me logged in</label></div>
    
      <input class="button" name="Submit" type="submit" value="Sign in" id="submit0" />
</form>
</div>
<div class="footer"><a href="http://www.avscripts.net/avarcade">AV Arcade</a> - Copyright 2006-2012 AV Scripts</div>
</body>