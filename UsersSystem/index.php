<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="zhaohui_html_php/zhaohui_image/common_1.png" />
<title>登陆中心</title>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
?>
<style type="text/css">
div,body,span,a,p,input,ul,li,img{
	list-style: none;
	margin: 0px;
	padding: 0px;
}
.top_bg {
	background-image: url(index_imgae/rl_topbg.png);
	background-repeat: repeat-x;
	height: 106px;
}
.top_bg .top_bg_center {
	background-image: url(index_imgae/rl_top.png);
	background-repeat: no-repeat;
	width: 980px;
	margin-top: 0px;
	margin-right: auto;
	margin-left: auto;
	height: 106px;
}
.center {
	width: 980px;
	margin-right: auto;
	margin-left: auto;
	height: 600px;
	padding-top: 30px;
}
.center .center_left {
	float: left;
	height: 350px;
	width: 480px;
	border-right-width: 2px;
	border-right-style: solid;
	border-right-color: #CCC;
	padding-top: 20px;
}
.center .center_left .center_left_top {
	height: 200px;
	width: 200px;
	background-image: url(index_imgae/liantu.png);
	background-repeat: no-repeat;
	margin-right: auto;
	margin-left: auto;
}
.center .center_left .center_left_bottom {
	height: 155px;
	width: 480px;
	background-image: url(index_imgae/border.png);
	background-repeat: no-repeat;
	position: relative;
	top: -60px;
}
.center .center_right {
	float: right;
	width: 490px;
	position: relative;
	height: 350px;
}
.center .center_right form input {
	font-family: "仿宋";
	font-size: 20px;
	display: block;
	height: 40px;
	width: 300px;
	margin-right: auto;
	margin-left: auto;
	clear: both;
	margin-bottom: 30px;
	border-radius:5px;
}
.center .center_right form .Id {
	margin-top: 50px;
}
.center .center_right form .denglu_btn {
	font-size: 18px;
	color: #FFF;
	background-color: #00a7de;
	border: 1px solid #0381aa;
	width: 250px;
}
.center .center_right form a {
	font-size: 12px;
	line-height: 20px;
	color: #00a1d6;
	display: block;
	float: right;
	text-decoration: none;
}
.center .center_right form .zhaohui {
	position: relative;
	top: -15px;
	right: 95px;
}
.center .center_right form .center_right_top {
	width: 150px;
	height: 55px;
	margin-top: 5px;
	margin-right: auto;
	margin-left: auto;
}
.center .center_right form .center_right_top a {
	font-size: 26px;
	display: block;
	height: 42px;
	width: 60px;
	line-height: 30px;
	color: #00C896;
	text-align: center;
	padding-top: 10px;
	float: left;
	border-bottom-width: 3px;
	border-bottom-style: solid;
	border-bottom-color: #00c986;
	font-weight: bold;
}
.center .center_right form .center_right_top a:hover{
	color: #00c986;
	text-decoration: none;
	border-bottom-width: 3px;
	border-bottom-style: solid;
	border-bottom-color: #00c986;	
}
.center .center_right form .center_right_top .zhuche {
	color: #6f6f6f;
	margin-left: 20px;
	border-bottom-color: #FFF;
}
.center .center_right form span {
	font-family: "仿宋";
	font-size: 14px;
	color: #F00;
	background-image: url(zhuce_html_php/image_zhuce/common_1.png);
	background-repeat: no-repeat;
	background-position: left center;
	display: none;
	padding-left: 20px;
	height: 25px;
	padding-top: 8px;
	position: absolute;
	left: 95px;
	top: 151px;
}
.center .center_left .center_left_bottom .center_left_bottom_text {
	font-size: 18px;
	color: #222;
	letter-spacing: 3px;
	text-align: center;
	margin-top: 60px;
}
.center .center_right form {
	height: 400px;
}
.center .center_right form .zhaohui:hover {
	color: #00F;
	text-decoration: underline;
}
.center .center_left .center_left_bottom_text {
	font-size: 18px;
	color: #222;
	letter-spacing: 4px;
	text-align: center;
	position: relative;
	top: -150px;
}
.center .center_right form #tishi {
	position: absolute;
	left: 96px;
	top: 225px;
}
.center .center_right form .shenfen input {
	display: inline-block;
	height: 15px;
	width: 15px;
	margin-left: 10px;
}
.center .center_right form .shenfen {
	text-align: center;
	height: 50px;
	font-family: "仿宋";
	font-size: 20px;
	line-height: 25px;
}
</style>
<script type="text/javascript">

function onFocus(obj){
	obj.nextSibling.innerHTML='请输入合法账户、密码!';
	obj.nextSibling.style.display='inline-block';
}
function onBlur(obj){
	if(obj.value==''){
		obj.nextSibling.innerHTML='不能为空!';
		obj.nextSibling.style.display='inline-block';	
	}
	else{
		obj.nextSibling.style.display='none';
		obj.nextSibling.style.display='inline-block';	
	}
}/*
function Wellcome(){
	alert("欢迎使用网络16324的用户系统,:)")
}*/

</script>
</head>
<body>
<div class="top_bg">
  <div class="top_bg_center"></div>
    </div>
<div class="center">
  <div class="center_left">
    <div class="center_left_top"></div>
    <div class="center_left_bottom">
      
    </div>
    <div class="center_left_bottom_text">扫描二维码登陆</div>
  </div>
  <div class="center_right">
      <form action="denglu.php" method="post" enctype="multipart/form-data">
      <div class="center_right_top">
      	  <a href="index.php" class="denglu">登陆</a><a href="zhuce_html_php/zhuce.html" class="zhuche">注册</a>
          </div>
          <input name="Id" type="text" placeholder="请输入你的用户名" class="Id" id="Id" onfocus="onFocus(this)" onblur="onBlur(this)" value="<?PHP if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>"/><span></span>
          <input name="Passwd" type="password"  placeholder="请输入你的密码" id="Passwd" onfocus="onFocus(this)" onblur="onBlur(this)"/><span id="tishi"></span>
          <a href="zhaohui_html_php/zhaohui_1.html" class="zhaohui">忘记密码？>></a>
          <div class="shenfen">
          <label><input name="shenfen" type="radio" value="游客" checked="checked" />游客</label><label><input name="shenfen" type="radio" value="管理员" />管理员</label>
          </div>
          <input name="denglu" type="submit" class="denglu_btn" value="登陆"/>
      </form>
  </div>
</div>
</body>
</html>