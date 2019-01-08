<meta charset='utf-8'>
<?php
	session_start();
	$_SESSION['baohu']=true;
	define('IN_PHP','111');
	include_once('class/mysql.class.php');
	$obj=new db_mysql('127.0.0.1','root','root','daxue');
	if(!empty($_GET))
	{
		$zhanghao=$_GET['zhanghao'];
		$mima=$_GET['mima'];
		$idcard=$_GET['idcard'];
		$sql="select id from xueshengdenglu where zhanghao = ".$zhanghao;
		$res=$obj->getone($sql);
		if(count($res)<1)
		{
			echo "<script>";
			echo "alert('没有这个帐号');";
			echo "location.href='password.php';";
			echo "</script>";
			exit();
		}
		$id=$res['id'];
		$sql2="select * from xueshengdenglu as a inner join xueshenggerenxinxi as b on a.id = b.id where a.id=".$id;
		$arr=$obj->getone($sql2);
		if ($idcard==$arr['gr_idcard'])
		{
			$sql="update xueshengdenglu set mima = '".$mima."' where id = ".$id;
			$res=$obj->query($sql);
			if ($res)
			{
				$_SESSION['id']=$id;
				echo "<script>";
				echo "alert('密码修改成功！登录成功');";
				echo "location.href='StudentIndex.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('密码修改失败');";
				echo "location.href='password.php';";
				echo "</script>";
			}
		}
		else
		{
			echo "<script>";
			echo "alert('身份证不正确！');";
			echo "location.href='password.php';";
			echo "</script>";
		}
	}
?>
