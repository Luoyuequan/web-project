<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理界面</title>
<?PHP
	$conn=mysql_connect('localhost','root','123456');
	if($conn){
		mysql_select_db('users');//连接数据库
		$sql="select * from client where 身份!='管理员'";
		$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
?>
<style type="text/css">
div,body,span,a,p,input,ul,li,img,h3,select{
	text-decoration:none;
	border:0px;
	list-style: none;
	margin: 0px;
	padding: 0px;
}
.top_bg {
	background-image:  url(index_imgae/rl_topbg.png);
	background-repeat: repeat-x;
	height: 106px;
}
.top_bg .top_bg_center {
	background-image: url(index_imgae/rl_top.png);
	background-repeat: no-repeat;
	width: 980px;
	margin-top: 0px;
	margin-left: 200px;
	height: 106px;
	display: inline-block;
}
.top_bg .zhuxiao {
	display: inline-block;
	float: right;
	height: 35px;
	width: 40px;
	margin-top: 30px;
	margin-right: 15px;
}
.top_bg .zhuxiao form input {
	font-family: "仿宋";
	font-size: 18px;
	line-height: 20px;
	color: #FFF;
	background-color: #00a1d6;
	height: 35px;
	width: 40px;
	display: inline-block;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
}
.center {
	width: 927px;
	border-top-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-left-style: solid;
	border-top-color: #000;
	border-left-color: #000;
	margin-top: 5px;
	margin-right: auto;
	margin-left: auto;
}
.center .center_top li {
	font-weight: bold;
}
.center ul {
	display:block;
	height: 30px;
	width: 927px;
}
.center ul li{
	display: block;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-right-style: solid;
	border-bottom-style: solid;
	border-right-color: #000;
	border-bottom-color: #000;
	width: 110px;
	font-family: "仿宋";
	font-size: 20px;
	line-height: 30px;
	height: 30px;
	text-align: center;
	float: left;
}
.center ul .time{
	width: 200px;
}
.center ul .wenti{
	width: 170px;
}
h3 {
	font-family: "仿宋";
	text-align: center;
}
.bottom {
	width: 302px;
	margin-top: 10px;
	margin-right: auto;
	margin-left: auto;
}
.bottom form input,.bottom form select {
	font-family: "仿宋";
	font-size: 20px;
	line-height: 30px;
	display: block;
	height: 30px;
	width: 300px;
	border: thin solid #CCC;
	margin-top: 10px;
}
</style>
</head>

<body>
<div class="top_bg">
  <div class="top_bg_center"></div>
  <div class="zhuxiao">
      <form action="client_system.php" method="post" enctype="multipart/form-data">
      	<input name="zhuxiao" type="submit" value="注销" />
      </form>
  </div>
    </div>
<h3>用户信息</h3>
<div class="center">
    <ul class="center_top"><li>账号</li><li>密码</li><li class="wenti">密保问题</li><li>密保答案</li><li>身份</li><li class="time">注册时间</li><li>操作</li></ul>
    <?PHP
            if(mysql_num_rows($result)){
                while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
    ?>
    <ul><li><?PHP echo $row['账号']; ?></li><li><?PHP echo $row['密码']; ?></li><li class="wenti"><?PHP echo $row['密保问题']; ?></li><li><?PHP echo $row['密保答案']; ?></li><li><?PHP echo $row['身份']; ?></li><li class="time"><?PHP echo $row['注册时间']; ?></li><li><a href="#" style="color:red;">删除</a></li></ul>		
    <?PHP
                }
            }
            mysql_close($conn);//关闭数据库
        }//确认是否连接数据库
        else{
            die('数据库连接失败:'.mysql_error());
        }
    ?>
    </div>
    <div class="bottom">
    <form action="infor_xg.php" method="post" enctype="multipart/form-data">
    <p style="font-family:'仿宋'; font-size:20px;">修改用户信息</p>
    <input type="text" placeholder="请输入需修改信息的用户账号"  name="id"/>
    <select name="xuanzhe">
    <option selected="selected">请选择需修改信息的列表名</option>
    <option value="密码">密码</option>
    <option value="密保问题">密保问题</option>
    <option value="密保答案">密保答案</option>
    <option value="身份">身份</option>
    </select>
    <input type="text" placeholder="请输入修改后的新信息"  name="new_infor"/>
    <input type="submit" name="infor_xg"  value="修改" />
    </form>
    </div>
</body>
</html>