<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon"  href="index_imgae/icons_m_sex_1.png" />
<title>用户中心</title>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	$Id=$_SESSION['username'];
	$nicheng='';
	$qianming='';
	$sex='';
	$hunyin='';
	$di_1='';
	$di_2='';
	$bool=false;
	$conn=mysql_connect('localhost','root','123456');
	if($conn){
		mysql_select_db('users');//连接数据库
		$sql="select * from client_infor where 账号='".$Id."'";
		$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
		if(mysql_num_rows($result)){
			$row=mysql_fetch_array($result,MYSQL_ASSOC);
			$nicheng=$row['昵称'];
			$qianming=$row['个性签名'];
			$sex=$row['性别'];
			$di_1=$row['第一地区'];
			$di_2=$row['第二地区'];
			$hunyin=$row['感情状况'];
		}
		mysql_close($conn);
	}
	else{
		die('数据库连接失败:'.mysql_error());
	}
	if($nicheng==''){
		$bool=true;
	}
?>
<style type="text/css">
div,body,span,a,p,input,ul,li,img{
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
.center {
	display: block;
	width: 980px;
	margin-top: 0px;
	margin-right: auto;
	margin-left: auto;
	border: 1px solid #999;
	height: 600px;
	border-radius:10px;
}
.center .center_left {
	float: left;
	width: 150px;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #999;
	height: 600px;
}
.center .center_left ul {
	width: 150px;
}
.center .center_left ul .center_left_frist {
	font-size: 16px;
	line-height: 36px;
	color: #99a2aa;
	display: block;
	height: 36px;
	padding-bottom: 7px;
	padding-left: 30px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #e1e2e5;
	
	text-align: left;
	width: 120px;
}

.center .center_left ul a {
	text-decoration:none;
	font-size: 14px;
	line-height: 48px;
	color: #222;
	display: block;
	height: 48px;
	width: 140px;
	text-align: center;
	padding-left: 10px;
}
.center .center_left ul a:hover{
	background-color: #00a1d7;
	color: #FFF;
}
.center .center_left ul .a_1 {
	color: #FFF;
	background-color: #00a1d7;
	background-image: url(index_imgae/icons_m.png);
	background-repeat: no-repeat;
	background-position: 0px -12px;
}
.center .center_left ul .a_2 {
	background-image: url(index_imgae/icons_m1.png);
	background-repeat: no-repeat;
	background-position: 28px 15px;
}
.center .center_left ul .a_3 {
	background-image: url(index_imgae/icons_m3.png);
	background-repeat: no-repeat;
	background-position: 25px 10px;
}
.center .center_left ul .a_4 {
	background-image: url(index_imgae/icons_m4.png);
	background-repeat: no-repeat;
	background-position: 28px 13px;
}
.center .center_right {
	width: 829px;
	float: left;
	height: 600px;
}
.center .center_right .center_right_top {
	height: 29px;
	width: 815px;
	padding-top: 15px;
	padding-left: 15px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #ddd;
	margin-bottom: 10px;
}
.center .center_right .center_right_top span {
	font-size: 16px;
	line-height: 20px;
	color: #00a1d6;
	display: block;
	border-left-width: 3px;
	border-left-style: solid;
	border-left-color: #00a1d6;
	padding-left: 10px;
	height: 20px;
	width: 100px;
	font-weight: bold;
}
.center .center_right .center_rigth_bottom .div_1 input {
	font-family: "仿宋";
	font-size: 20px;
	line-height: 20px;
	display: inline-block;
	height: 40px;
	width: 300px;
	border-radius:5px;
}
.center .center_right .center_rigth_bottom .div_1 span {
	font-family: "仿宋";
	font-size: 20px;
	line-height: 25px;
	text-align: right;
	display: block;
	float: left;
	margin-top: 10px;
	height: 25px;
}
.center .center_right .center_rigth_bottom div {
	margin-bottom: 15px;
	padding-left: 50px;
	padding-top: 15px;
}
.center .center_right .center_rigth_bottom .div_1 .name_1,.center .center_right .center_rigth_bottom .div_1 .name_2 {
	padding-left: 50px;
	padding-top: 5px;
	padding-bottom: 5px;
}
.center .center_right .center_rigth_bottom .div_1 {
	padding-left: 0px;
}
.center .center_right .center_rigth_bottom div span {
	font-family: "仿宋";
	font-size: 20px;
	line-height: 20px;
	display: block;
	float: left;
	height: 25px;
}
.center .center_right .center_rigth_bottom div textarea {
	height: 100px;
	width: 600px;
	overflow: auto;
	font-family: "仿宋";
	font-size: 20px;
	color: #00a1d7;
	border-radius:10px;
}
.center .center_right .center_rigth_bottom .sex {
	height: 40px;
}
.center .center_right .center_rigth_bottom .sex div {
	float: left;
}
.center .center_right .center_rigth_bottom .sex .sex_nv {
	background-image: url(index_imgae/icons_m_sex_1.png);
	background-repeat: no-repeat;
	margin-left: 20px;
	width: 60px;
	margin-bottom: 0px;
	background-position: 25px 2px;
	height: 20px;
	padding-top: 5px;
	padding-right: 0px;
	padding-bottom: 5px;
	padding-left: 0px;
}
.center .center_right .center_rigth_bottom .sex .sex_nan {
	margin-bottom: 0px;
	margin-left: 20px;
	width: 60px;
	background-image: url(index_imgae/icons_m_sex_2.png);
	background-repeat: no-repeat;
	background-position: 25px 2px;
	height: 20px;
	padding-top: 5px;
	padding-right: 0px;
	padding-bottom: 5px;
	padding-left: 0px;
}
.center .center_right .center_rigth_bottom div select {
	height: 40px;
	width: 150px;
	margin-left: 10px;
	font-family: "仿宋";
	font-size: 14px;
	line-height: 20px;
	text-align: center;
	border-radius:10px;
}
.center .center_right .center_rigth_bottom div .hunyin {
	width: 100px;
}
.center .center_right .center_rigth_bottom .baocun {
	height: 40px;
	width: 300px;
	margin-top: 0px;
	margin-left:200px;
	padding: 0px;
	margin-bottom: 0px;
}
.center .center_right .center_rigth_bottom .baocun input {
	font-family: "仿宋";
	font-size: 20px;
	line-height: 25px;
	color: #FFF;
	background-color: #00a0d8;
	border-radius:15px;
	text-align: center;
	height: 40px;
	width: 300px;
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
</style>
<script type="text/javascript">
var array_1=new Array()
<?PHP
	$array_1=array('北京市'=>array('西城区','崇文区','宣武区','朝阳区'),'上海市'=>array('黄浦区','卢湾区','徐汇区','长宁区','静安区'),'天津市'=>array('和平区','河东区','河西区','南开区','河北区'),'四川省'=>array('成都市','自贡市','攀枝花市','泸州市','德阳市','绵阳市'),'重庆市'=>array('渝中区','大渡口区','江北区','沙坪坝区','九龙坡区','南岸区'));
	foreach($array_1 as $key => $value){
		echo "array_1['".$key."']=new Array(";
		for($i=0;$i<count($value);$i++){
			echo "'".$value[$i]."'";
			if($i<count($value)-1){
				echo ",";
			}
		}
		echo ");\n";
	}
?>
function onChange(obj){
	document.form1.dierdiqu.length = 0;
	document.form1.dierdiqu.options[0] = new Option('--选择具体地区--');
	for(i=0;i<array_1[obj].length;i++){
		document.form1.dierdiqu.options[i+1] = new Option(array_1[obj][i],array_1[obj][i]);
	}
}
<?PHP
if($nicheng!=''){
	echo '
	function Selected(){
		document.form1.dierdiqu.length = 0;
		document.form1.dierdiqu.options[0] = new Options("'.'--选择具体地区--'.'");
		for(i=0;i<array_1["'.$di_1.'"].length;i++){
			document.form1.dierdiqu.options[i+1] = new Options(array_1["'.$di_1.'"][i],array_1["'.$di_1.'"][i]);
		}
		document.getElementById("'.$sex.'").checked=true
		for (i = 0;i<document.form1.diyidiqu.length;i++) {
            if (document.form1.diyidiqu.options[i].value == "'.$di_1.'") {
                document.form1.diyidiqu.options[i].selected = true;
                break;
            }
        }
		for (i = 0;i<document.form1.dierdiqu.length;i++) {
            if (document.form1.dierdiqu.options[i].value == "'.$di_2.'") {
                document.form1.dierdiqu.options[i].selected = true;
                break;
            }
        }
		for (i = 0;i<document.form1.hunyin.length;i++) {
            if (document.form1.hunyin.options[i].value == "'.$hunyin.'") {
                document.form1.hunyin.options[i].selected = true;
                break;
            }
        }
	}
	';
}
?>
</script>
</head>
<body onload="Selected()">
<div class="top_bg">
  <div class="top_bg_center"></div>
  <div class="zhuxiao">
      <form action="client_system.php" method="post" enctype="multipart/form-data">
      	<input name="zhuxiao" type="submit" value="注销" />
      </form>
  </div>
    </div>
<form action="client_system.php" method="post" enctype="multipart/form-data" class="center" name="form1">
  <div class="center_left">
  <ul>
  <li class="center_left_frist">个人中心</li>
  <a class="a_1" href="#">用户信息</a>
  <a class="a_2" href="#">我的记录</a>
  <a class="a_3" href="#">账号安全</a>
  <a class="a_4" href="#">我的硬币</a>
  </ul>
  </div>
  <div class="center_right">
    <div class="center_right_top">
    <span>我的信息</span>
    </div>
    <div class="center_rigth_bottom">
        <div class="div_1">
        	<div class="name_1">
            	<span>昵称：</span><input name="nicheng" type="text"  placeholder="请输入你的昵称" value="<?PHP echo $nicheng;?>"/>
           	</div>
            <div class="name_2">
            	<span>账户：</span><input name="Id" type="text"  value="<?PHP echo $Id;?>" readonly="readonly"/>
            </div>
        </div>
        <div>
        	<span>个性签名：</span><textarea name="qianming"  placeholder="请写出你的个性签名......"><?PHP echo $qianming;?></textarea>
        </div>
        <div class="sex">
        	<span>性别：</span><div class="sex_nv"><input name="sex" type="radio" value="女" id="女"/></div><div class="sex_nan"><input  name="sex" type="radio" value="男" checked="checked" id="男"/></div>'
        </div>
        <div>
            <span>所在地：</span>
            <select name="diyidiqu" onchange="onChange(this.value)" id="diyi">
                <option >--选择一级地区--</option>
                <option value="北京市">北京市</option>
                <option value="上海市">上海市</option>
                <option value="天津市">天津市</option>
                <option value="重庆市">重庆市</option>
                <option value="四川省">四川省</option>
            </select>
            <select name="dierdiqu">
                <option>--选择具体地区--</option>
            </select>
        </div>
        <div>
          <span>感情状况：</span>
            <select name="hunyin" class="hunyin" >
            <option >--请选择--</option>
            <option value="未婚">未婚</option>
            <option value="已婚">已婚</option>
            </select>
      	</div>
        <div class="baocun">
        <input name="baocun" type="submit"  value="保存"/>
        </div>
    </div>
  </div>
</form>
</body>
</html>
<?PHP 
	if($bool){
		echo "<script>alert('你是新用户请填写信息!')</script>";
	}
?>