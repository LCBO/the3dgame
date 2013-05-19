<?php if ($login_status != 1) exit(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AV Arcade Admin</title>
<style>
.box {
	margin: auto;
	background: #ededed; 
	width:500px; 
	margin-top:100px; 
	text-align:center; 
	padding-top:20px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	background-image: url(images/login_box.png);
	border: 1px solid #cccccc;
	-moz-border-radius: 10px;
}
.button {
	text-decoration: none;
	font-size: 12px;
	padding: 0px 20px 2px 20px;
	cursor: pointer;
	border: 1px solid #b8b8b8;
	-moz-border-radius: 15px;
	-khtml-border-radius: 8px;
	-webkit-border-radius: 8px;
	border-radius: 8px;
	box-sizing: content-box;
	background-color: #FFF;
	background-image:url(images/button_grad.png);
	background-position: bottom;
	height: 26px;
}
.footer {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 12px;
	color: #6e6e6f;
	text-align: center;
}
.footer a {
	color: #585859;
}
.info {
	width: 80%;
	margin: auto;
	padding-bottom: 20px;
	text-align: center;
}
</style>
</head>

<body>


<div class="box">
<img src="images/ava_logo.png" /><br /><br />
<form name="form1" method="post" target="_self" action="update_key.php">
  License key<br />
  <input name="key" type="text" id="key" class="form_textbox" size="50"><br /><br />
    
      <input class="button" name="Submit" type="submit" value="Unlock admin" id="submit0" /><br /><br />
     <div class="info">If you are seeing this screen after entering your key, make sure that you have entered it correctly!</div>
</form>
</div>
<div class="footer"><a href="http://www.avscripts.net/avarcade">AV Arcade</a> - Copyright 2006-2012 AV Scripts</div>
</body>