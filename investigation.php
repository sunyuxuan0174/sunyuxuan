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
	$sql="select * from stu_jiuyediaocha as a inner join xueshengdenglu as b on a.id=b.id where b.id = ".$id;
	$res=$obj->getone($sql);
	
	if(!empty($_POST))
	{
		$dc_id=$res['dc_id'];
		//print_r($_POST);
		$flag=$obj->update('stu_jiuyediaocha',$_POST,'dc_id='.$dc_id);
		if($flag)
		{
			echo "<script>";
			echo "alert('修改成功');";
			echo "location.href='investigation.php';";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('修改失败');";
			echo "location.href='investigation.php';";
			echo "</script>";
		}
	}
?>
<body>
<form action="investigation.php" method='post'>
<script>
<!--
function submit()
{
	document.forms[0].submit();
}
-->
</script>
    <div class="container">
        <div class="content">
            <div class="header clearfix">
                <div class="top fl">当前位置>就业调查</div>
                <div class="bottom fr">
                    <a href="javascript:;"  class="l">编辑</a>
                    <a href="javascript:submit();" onclick="formSubmit(formID)" class="r">保存</a>
                </div>
            </div>
            <div class="main">
                <!--基础信息-->
                <div class="BasicInformation">
                    <div class="title">
                        基础调查
                    </div>
                </div>
                <div class="content clearfix">
                    <div class="left fl">
                        <div>
                            <label for="">期望工作地域：</label>
                            <input id="province" type="text" name='dc_diyu' value="<?php echo $res['dc_diyu']?>" class="oInp" readonly />
                        </div>
                        <div>
                            <label for="">期望单位性质：</label>
                            <input  id="unit_pro" type="text" name='dc_xingzhi' value="<?php echo $res['dc_xingzhi']?>" class="oInp" readonly />
                        </div>
                        
                        <div>
                            <label for="">是否准备升学：</label>
                            <select id="entrance" class="oInp"  style="border:0; outline: none;width: 150px; height: 30px; border: 1px solid #ccc; background: #fff" name='dc_shengxue' value="0" readonly />
                                <option value="否" <?php if($res['dc_shengxue']=='否') {echo "selected";};?> >
                                    否
                                </option>
                                <option value="是" <?php if($res['dc_shengxue']=='是') {echo "selected";};?> >
                                    是
                                </option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="">备注说明：</label>
                            <input id="remarks" type="text" name='dc_shuoming' value="<?php echo $res['dc_shuoming']?>" style="width:170px;" class="oInp" readonly />
                        </div>
                    </div>
                    <div class="right fr">
                        <div>
                            <label for="">期望工作地点：</label>
                            <input id="city" type="text" name='dc_qiwang' value="<?php echo $res['dc_qiwang']?>" class="oInp" readonly />
                        </div>
                        <div>
                            <label for="">毕业期望薪酬：</label>
                            <input id="expect_salary" type="text" name='dc_xinchou' value="<?php echo $res['dc_xinchou']?>" class="oInp" readonly />
                        </div>
                        <div>
                        <label for="">工作与专业相关度：</label>
                        <input id="work_pro" type="text" name='dc_xiangguan' value="<?php echo $res['dc_xiangguan']?>" class="oInp" readonly />
                    </div>
                    </div>
                    <div class="reason fl">
                        <p>毕业去向情况统计：</p>
                        <div style="margin-left: 65px ;width:515px;height:118px;">
                            <textarea id="situation" name='dc_tongji'  class="oInp" readonly /><?php echo $res['dc_tongji']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script>
        /*$('select').attr('value','0');
        $.ajax({
            url: "http://101.201.154.205:9090/survey/getSurveyByStuId",
            data: {
                stuId:1,
                t: Math.random()
            },
            type: 'get',
            dataType: 'jsonp',
            'jsonp': 'callback'
            }).then(function (res) {
            $('select option').each(function(index,arg){
                if($(this).val() == res.entrance){
                    $(this).attr('selected','selected');
                }
            });
            $('select').attr('value',res.entrance);
            $('#expect_salary').attr('value',res.expect_salary);
            $('#situation').text(res.situation);
            $('#city').attr('value',res.city);
            $('#work_pro').attr('value',res.work_pro);
            $('#remarks').attr('value',res.remarks);
            $('#unit_pro').attr('value',res.unit_pro);
            $('#province').attr('value',res.province);


        },function (err) {
            console.log(err);
        });*/
        $('.l').click(function () {
            $('.oInp').removeAttr('readonly');
        });

        $('.r').click(function () {
            $('.oInp').attr('readonly','readonly');

            $.ajax({
                url: "http://101.201.154.205:9090/survey/surveyUpdateDo",
                data: {
                    stu_id:"1",
                    expect_salary:$('#expect_salary').val(),
                    entrance:$('select').val(),
                    remarks:$('#remarks').val(),
                    province:$('#province').val(),
                    city:$('#city').val(),
                    situation:$('#situation').val(),
                    work_pro:$('#work_pro').val(),
                    unit_pro:$('#unit_pro').val(),
                    t: Math.random()
                },
                type: 'get',
                dataType: 'jsonp',
                'jsonp': 'callback'
            }).then(function (res) {
                console.log(res);

            },function (err) {
                console.log(err);
            });


        });

    </script>
</form>
</body>
</html>
