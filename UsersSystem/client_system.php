<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心</title>
</head>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	if(isset($_POST['baocun'])){
		$nicheng=$_POST['nicheng'];
		$sex=$_POST['sex'];
		$Id=$_POST['Id'];
		$qianming=$_POST['qianming'];
		$d_1=$_POST['diyidiqu'];
		$d_2=$_POST['dierdiqu'];
		$hunyin=$_POST['hunyin'];
		if(!empty($_POST['nicheng'])&!empty($_POST['Id'])&!empty($_POST['qianming'])&!empty($_POST['sex'])&$_POST['diyidiqu']!='--选择一级地区--'&$_POST['dierdiqu']!='--选择具体地区--'&$_POST['hunyin']!='--请选择--'){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="update client_infor set 昵称='".$nicheng."',个性签名='".$qianming."',性别='".$sex."',第一地区='".$d_1."',第二地区='".$d_2."',感情状况='".$hunyin."' where 账号='".$Id."'";
				mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				mysql_close($conn);
				echo "<script>alert('保存成功,点击确定进行查看!')</script>";
				header('refresh:0;url=client_web.php');
			}
			else{
				die('数据库连接失败:'.mysql_error());
			}
		}
		else{
			echo "<script>alert('个人信息当中不能有空!')</script>";
			header('refresh:0;url=client_web.php');
		}
	}
	if(isset($_POST['zhuxiao'])){
		if(session_destroy()){
			echo "<script>alert('注销成功,点击确定返回登录!')</script>";
			header('refresh:0;url=Index.php');
		}	
	}
?>
<body>
</body>
</html>
