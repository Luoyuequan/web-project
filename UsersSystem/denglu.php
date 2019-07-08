<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
</head>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	if(isset($_POST['denglu'])){
		$Bool=true;
		$bool=true;
		if(empty($_POST['Id'])&empty($_POST['Passwd'])){
			$Bool=false;
			$bool=false;
			echo "<script>alert('请输入用户名和密码!!')</script>";
			header('refresh:0;url=Index.php');
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="select 账号 from client where 账号='".$_POST['Id']."'";
				$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				if(mysql_num_rows($result)){
					$row=mysql_fetch_array($result,MYSQL_ASSOC);
					if($row['账号']==$_POST['Id']){
						$Bool=true;
						$bool=false;
					}
				}
				mysql_close($conn);
			}
			else{
				die('数据库连接失败:'.mysql_error());
			}
		}
		if($bool){
			$Bool=false;
			echo "<script>alert('账号不存在!')</script>";
			header('refresh:0;url=Index.php');
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="select 密码,身份 from client where 账号='".$_POST['Id']."'";
				$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				if(mysql_num_rows($result)){
					$row=mysql_fetch_array($result,MYSQL_ASSOC);
					if($row['密码'].$row['身份']==$_POST['Passwd'].$_POST['shenfen']){
						if($_POST['shenfen']=='游客'){
							$_SESSION['username']=$_POST['Id'];
							echo "<script>alert('登陆成功!!')</script>";
							header('refresh:0;url=client_web.php');
						}
						if($_POST['shenfen']=='管理员'){
							$_SESSION['username']=$_POST['Id'];
							echo "<script>alert('登陆成功!!')</script>";
							header('refresh:0;url=guanli.php');
						}
					}
					if($row['密码']!=$_POST['Passwd']){
						$_SESSION['username']=$_POST['Id'];
						echo "<script>alert('密码错误!')</script>";
						header('refresh:0;url=Index.php');
					}
					if($row['密码']==$_POST['Passwd']&$row['身份']!=$_POST['shenfen']){
						echo "<script>alert('用户身份错误!')</script>";
						header('refresh:0;url=Index.php');
					}
				}
				mysql_close($conn);
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

