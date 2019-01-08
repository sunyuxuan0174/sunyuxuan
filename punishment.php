<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/punishment.css">
</head>
<?php
	session_start();
	$id=$_SESSION['id'];
	define('IN_PHP','111');
	include_once('class/mysql.class.php');
	$obj=new db_mysql('127.0.0.1','root','root','daxue');
	$sql="select * from stu_chufenxinxi as a inner join xueshengdenglu  as b on a.id=b.id where b.id = ".$id;
	$res=$obj->getone($sql);
	//print_r($res);
	if(!empty($_POST))
	{
		$cf_id=$res['cf_id'];
		//print_r($_POST);
		$flag=$obj->update('stu_chufenxinxi',$_POST,'cf_id='.$cf_id);
		if($flag)
		{
			echo "<script>";
			echo "alert('修改成功');";
			echo "location.href='punishment.php';";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('修改失败');";
			echo "location.href='punishment.php';";
			echo "</script>";
		}
	}
?>
<script>
function submit()
{
	document.forms[0].submit();
}
</script>
<form action="punishment.php" method="post">
<body>
    <div class="container">
        <div class="content">
            <div class="header clearfix">
                <div class="top fl">当前位置>处分信息</div>
                <div class="bottom fr">
                    <a id="emit" href="javascript:;">编辑</a>
                    <a id="keep" href="javascript:submit();" onclick="formSubmit(formID)">保存</a>
                </div>
            </div>
            <div class="main">
                <!--基础信息-->
                <div class="BasicInformation">
                    <div class="title">基础信息</div>
                </div>
                <div class="content clearfix">
                    <div class="left fl">
                        <div>
                            <label for="">处分等级：</label>
                            <input type="text" name="cf_dengji" value="<?php echo $res['cf_dengji']?>" readonly />
                        </div>
                        <div>
                            <label for="">处分日期：</label>
                            <input type="date" name="cf_riqi" value="<?php echo $res['cf_riqi']?>" readonly />
                        </div>
                    </div>
                    <div class="right fr">
                        <div>
                            <label for="">处分名称：</label>
                            <input type="text" name="cf_mingcheng" value="<?php echo $res['cf_mingcheng']?>" readonly />
                        </div>
                        <div>
                            <label for="">经办人姓名：</label>
                            <input type="text" name="cf_jingbanren" value="<?php echo $res['cf_jingbanren']?>" readonly />
                        </div>
                    </div>
                    <div class="reason fl">
                        <p>处分理由：</p>
                        <div>
                            <textarea name="cf_liyou" readonly /><?php echo $res['cf_liyou']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$('#emit').on('click',function(){
        	$('input').removeAttr('readonly');
        	$('textarea').removeAttr('readonly');
        });
        $('#keep').on('click',function(){
        	$('input').attr('readonly','readonly');
        	$('textarea').attr('readonly','readonly');
        });
	</script>
</body>
</form>
</html>