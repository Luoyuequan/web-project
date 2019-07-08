<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
</head>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	$id=$_SESSION['ID'];
	$passwd_1=$_POST['Passwd_1'];
	$passwd_2=$_POST['Passwd_2'];
	if(isset($_POST['xiugai'])){
		$Bool=true;
		if(empty($_POST['Passwd_1'])|empty($_POST['Passwd_2'])){
			$Bool=false;
        	echo "<script>alert('密码不能为空!!')</script>";
			header('refresh:0;url=zhaohui_2.html');
        }
		if(!empty($_POST['Passwd_1'])&!empty($_POST['Passwd_2'])){
			if($_POST['Passwd_1']!=$_POST['Passwd_2']){
				$Bool=false;
				echo "<script>alert('两次输入的密码不一致!!')</script>";
				header('refresh:0;url=zhaohui_2.html');
			}
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="update client set 密码='".$passwd_1."' where 账号='".$id."'";
				$sql_1="select 密码 from client where 账号='".$id."'";
				$result_1=mysql_query($sql_1) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql_1);
				if($result_1){
					$row=mysql_fetch_array($result_1,MYSQL_ASSOC);
					if($row['密码']==$passwd_1){
						echo "<script>alert('旧密码与新密码不能一致!')</script>";
						header('refresh:0;url=zhaohui_2.html');
					}
					else{
						$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
						mysql_close($conn);//关闭数据库
						echo "<script>alert('修改成功,点击确定开始登陆!')</script>";
						unset($_SESSION['ID']);
						header('refresh:0;url=../Index.php');
					}
				}
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