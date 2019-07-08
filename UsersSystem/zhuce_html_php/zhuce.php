<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册界面</title>
</head>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
    if(isset($_POST['zhuce'])){
		$Bool=true;
    	if(empty($_POST['Id'])|empty($_POST['Passwd_1'])|empty($_POST['Passwd_2'])){
			$Bool=false;
        	echo "<script>alert('账户、密码不能为空!!')</script>";
			header('refresh:0;url=zhuce.html');
        }
		if(!empty($_POST['Passwd_1'])&!empty($_POST['Passwd_2'])){
			if($_POST['Passwd_1']!=$_POST['Passwd_2']){
				$Bool=false;
				echo "<script>alert('两次输入的密码不一致!!')</script>";
				header('refresh:0;url=zhuce.html');
			}
		}
		if($Bool){
			if($_POST['mibao']=='请选择密保问题'){
				$Bool=false;
				echo "<script>alert('请选择密保问题!!')</script>";
				header('refresh:0;url=zhuce.html');
			}
		}
		if($Bool){
			if(empty($_POST['mibao_daan'])){
				$Bool=false;
				echo "<script>alert('请填写密保答案!!')</script>";
				header('refresh:0;url=zhuce.html');
			}
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql='select 账号 from client';
				$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				if(mysql_num_rows($result)){
					while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
						if($row['账号']==$_POST['Id']){
							$Bool=false;
							break;
						}
					}
				}
				mysql_close($conn);
			}
			else{
				die('数据库连接失败:'.mysql_error());
			}
		}
		if(!$Bool){
			echo "<script>alert('账号已存在!')</script>";
			header('refresh:0;url=zhuce.html');
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="insert into client set 账号='".$_POST['Id']."',密码='".$_POST['Passwd_1']."',密保问题='".$_POST['mibao']."',密保答案='".$_POST['mibao_daan']."',注册时间=now()";
				$sql_1="insert into client_infor set 账号='".$_POST['Id']."'";
				mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				mysql_query($sql_1) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql_1);
				mysql_close($conn);
				echo "<script>alert('注册成功!')</script>";
				header('refresh:0;url=../Index.php');
			}
			else{
				die('数据库连接失败:'.mysql_error());
			}
		}
    }
?>
<body>
</body>
</html>

