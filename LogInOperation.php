<?php
	include_once("db.php");
	$Flag = $_POST["Flag"];
	session_start();
	if($Flag == 'LogoutMeNow')
	{
		session_destroy();
		header("location:login.php");
	}
	else if($Flag == 'login')
	{
		$UserName=$_POST["UserName"];
		$Password=$_POST["Password"];
		$query=mysql_query("select * from login where UserName='$UserName' and Password='$Password'");
		if(mysql_num_rows($query)!=0)
		{
			echo "success";
			$_SESSION['Admin'] = $UserName;
		}
		else
		{
			echo "Please Check UserName and Password";
		}
	}
?>