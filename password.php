<?php
session_start();
$_SESSION['baohu']=true;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/password.css"/>
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<script>
	<!--
		$(function()
		{
			$('#aaa').click(function()
			{
				var zhanghao=$('#zhanghao').val();
				var mima=$('#mima').val();
				var idcard=$('#idcard').val();
				if(zhanghao=="" || mima=="" || idcard=="")
				{
					alert("文本框不能为空");
					return flase;
				}
				$('#aaa a').attr('href',"wangjimima.php?zhanghao="+zhanghao+"&idcard="+idcard+"&mima="+mima+"");
			})
		})
	-->
	</script>
	<body>
		<div class="login">
			<div class="content clearfix">
				<div class="content-left">
					<div class="logo">
						<img src="images/logo.png" alt=""/>
						<p>大学就业管理系统</p>
					</div>
				</div>
				<div class="shu"></div>
				<div class="content-right">
					<div class="login-form">
						<h2>忘记密码/LOGIN</h2>
						<div class="identifire">
							<span>　账　号：</span>
							<input type="text" name='zhanghao' id='zhanghao' />
						</div>
						<div class="account clearfix">
							<span>身份证号：</span>
							<input type="text" name='idcard' id='idcard' />
						</div>
						<div class="password clearfix">
							<span>输入密码：</span>
							<input type="text" name='mima' id='mima' />
						</div>
						<!--
						<div class="code clearfix">
							<span>　验证码：</span>
							<input type="text" />
							<em></em>
						</div>-->
						<div class="btn" id='aaa'>
							<span><a href="">提交并登录</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<script type="text/javascript">
			$(document).ready(function(){
				if (window.PIE) {
			        $('.rounded').each(function() {
			            PIE.attach(this);
			        });
			    }
			});
		</script>-->
	</body>
</html>
