<?php
	session_start();
	if(@!$_SESSION['baohu'])
	{
		exit('无权访问');
	}
?>
