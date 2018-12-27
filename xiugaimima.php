<?php
	define('IN_PHP','111');
	session_start();
	include_once('class/mysql.class.php');
	$obj=new db_mysql('127.0.0.1','root','root','daxue');	
	if(!empty($_POST))
	{
		$mima=trim($_POST['mima']);
		$newmima=trim($_POST['newmima']);
		$newmima2=trim($_POST['newmima2']);
		$shenfen=$_SESSION['shenfen'];
		//exit();
		if($mima == "" or $newmima == "" or $newmima2 == "")
		{
			echo "<script>";
			echo "alert('文本框不能为空');";
			echo "location.href='Revise.html';";
			echo "</script>";
			exit();
		}
		
		if($mima == $newmima)
		{
			echo "<script>";
			echo "alert('修改密码与原密码相同');";
			echo "location.href='Revise.html';";
			echo "</script>";
			exit();
		}
		if($newmima != $newmima2)
		{
			echo "<script>";
			echo "alert('两次修改密码不一致');";
			echo "location.href='Revise.html';";
			echo "</script>";
			exit();
		}
		
		if ($shenfen == "'学生'")
		{
			$id=$_SESSION['id'];
			$sql="select * from xueshengdenglu where id = ".$id;
			$res=$obj->getone($sql);
			$yuanmima=$res['mima'];
			if($mima != $yuanmima)
			{
				echo "<script>";
				echo "alert('原密码错误');";
				echo "location.href='Revise.html';";
				echo "</script>";
				exit();
			}
			$sql2="update xueshengdenglu set mima = '".$newmima."' where id = ".$id;
			$res2=$obj->query($sql2);
			if(!$res2)
			{
				echo "<script>";
				echo "alert('修改失败');";
				echo "location.href='Revise.html';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('修改成功');";
				echo "top.location.href='Login.html';";
				echo "</script>";
			}
		}
		
		if ($shenfen == "'教师教辅人员'")
		{
			$t_id=$_SESSION['t_id'];
			$sql="select * from tea_denglu where id = ".$t_id;
			$res=$obj->getone($sql);
			$yuanmima=$res['mima'];
			if($mima != $yuanmima)
			{
				echo "<script>";
				echo "alert('原密码错误');";
				echo "location.href='Revise.html';";
				echo "</script>";
				exit();
			}
			$sql2="update tea_denglu set mima = '".$newmima."' where id = ".$t_id;
			$res2=$obj->query($sql2);
			if(!$res2)
			{
				echo "<script>";
				echo "alert('修改失败');";
				echo "location.href='Revise.html';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('修改成功');";
				echo "top.location.href='Login.html';";
				echo "</script>";
			}
		}
	}
?>
