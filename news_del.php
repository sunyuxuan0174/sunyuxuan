<?php
	define('IN_PHP','');
	require_once('class/mysql.class.php');

	$dbObj=new db_mysql('localhost','root','root','myphp');

	$id=isset($_GET['id'])?$_GET['id']:'';
	$page=isset($_GET['page'])?$_GET['page']:'';
	$sql="delete from tb_news where id=".$id;
	$flg=$dbObj->query($sql);
	if ($flg)
	{
		echo "<script>";
		echo "alert('删除成功');";
		echo "location.href='news_index.php?pno=".$page."';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('删除失败');";
		echo "location.href='news_index.php?page=".$page."';";
		echo "</script>";
	}
?>