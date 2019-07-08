<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
</head>
<?PHP
	header("Content-Type:text/html;charset=utf-8");
	session_start();
    if(isset($_POST['zhaohui_1'])){
		$Bool=true;
		if(empty($_POST['Id'])|empty($_POST['mibao_daan_a'])){
			$Bool=false;
        	echo "<script>alert('账户、问题答案不能为空!!')</script>";
			header('refresh:0;url=zhaohui_1.html');
		}
		if($Bool){
			if($_POST['mibao']=='请选择设置过的密保问题'){
				$Bool=false;
        		echo "<script>alert('请选择设置过的密保问题!!')</script>";
				header('refresh:0;url=zhaohui_1.html');
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
							$Bool=true;
							break;
						}
						else{$Bool=false;}
					}
				}
				mysql_close($conn);//关闭数据库
			}
			else{
				die('数据库连接失败:'.mysql_error());
			}
			if(!$Bool){
				echo "<script>alert('账号不存在!')</script>";
				header('refresh:0;url=zhaohui_1.html');
			}
		}
		if($Bool){
			$conn=mysql_connect('localhost','root','123456');
			if($conn){
				mysql_select_db('users');//连接数据库
				$sql="select 密保问题,密保答案 from client where 账号='".$_POST['Id']."'";
				$result=mysql_query($sql) or die("<br/>error:<b>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
				if(mysql_num_rows($result)){
					while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
						if($row['密保问题'].$row['密保答案']==$_POST['mibao'].$_POST['mibao_daan_a']){
							$_SESSION['ID']=$_POST['Id'];
							echo "<script>alert('身份验证成功!')</script>";
							header('refresh:0;url=zhaohui_2.html');
						}
						if($row['密保问题']!=$_POST['mibao']){
							echo "<script>alert('密保问题错误!')</script>";
							header('refresh:0;url=zhaohui_1.html');
						}
						if($row['密保问题']==$_POST['mibao']&$row['密保答案']!=$_POST['mibao_daan_a']){
							echo "<script>alert('密保答案错误!')</script>";
							header('refresh:0;url=zhaohui_1.html');
						}
					}
				}
				mysql_close($conn);//关闭数据库
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