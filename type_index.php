<?php
	define('IN_PHP','');
	require_once('class/mysql.class.php');
	require_once('class/Page.class.php');

	$dbObj=new db_mysql('localhost','root','root','myphp');

	$sql='select count(*) as n from tb_type';
	$arr=$dbObj->getone($sql);
	$pageObj=new Page($arr['n'],'10');

	$sql="select * from tb_type limit ".$pageObj->limit();
	$nArr=$dbObj->getall($sql);

	$curp=isset($_GET['pno'])?$_GET['pno']:1;
?>
<html>
	<head>
		<meta charset='utf-8'>
		<script>
		<!--
			function mytst()
			{
				if(confirm('确定要删除吗？'))
				{
					alert('yes');
				}
				else
				{
					alert('no');
				}
			}
			function delone(a,b)
			{
				if(confirm('确定要删除吗？'))
				{
					location.href="type_del.php?id="+a+"&page="+b;
				}
			}
		-->
		</script>
	</head>
	<body>
		<table border='1' style='border-collapse:collapse' width='100%'>
			<tr>
				<td>序号</td>
				<td>类型</td>
				<td><a href='type_add.php'>添加</a></td>
			</tr>
			<?php
				for ($i=0;$i<count($nArr);$i++)
				{
			?>
			<tr>
				<td><?php echo $nArr[$i]['id']?></td>
				<td><?php echo $nArr[$i]['tname']?></td>
				<td>
					<a href='type_update.php?id=<?php echo $nArr[$i]['id']?>&page=<?php echo $curp?>'>
						修改
					</a>
					<a href="javascript:;" onclick='delone("<?php echo $nArr[$i]['id']?>","<?php echo $curp?>");'>
						删除
					</a>
				</td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan='4'><?php echo $pageObj->pageBar('1')?></td>
			</tr>
		</table>
	</body>
</html>