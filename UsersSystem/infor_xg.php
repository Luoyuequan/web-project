<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理界面</title>
</head>
<?PHP
if(isset($_POST['infor_xg'])){
	if(empty($_POST['new_infor'])|empty($_POST['id'])|$_POST['xuanzhe']=='请选择需修改信息的列表名'){
		echo "<script>alert('信息不能为空!')</script>";
		header('refresh:0;url=guanli.php');
	}
	else{
		$conn=mysql_connect('localhost','root','123456');
		if($conn){
			mysql_select_db('users');//连接数据库
			$sql="update client set ".$_POST['xuanzhe']."='".$_POST['new_infor']."' where 账号='".$_POST['id']."'";
			$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
			mysql_close($conn);//关闭数据库
			if($result){
				echo "<script>alert('修改成功!')</script>";
				header('refresh:0;url=guanli.php');
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