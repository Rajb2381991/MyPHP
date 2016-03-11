<?php
	session_start();
	if(isset($_SESSION['Admin']))
	{
		echo "<script>window.location='Home.php';</script>";
	}
?>
	<link rel="stylesheet" href="css/themes/semantic.css">
	<link rel="stylesheet" href="css/themes/semantic.min.css">
	<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/alertify.css">
<script src="js/jquery.min.js"></script>
<script src="alertify.js"></script>
<link href="mycss.css" rel="stylesheet">
<script>
	$(document).ready(function()
	{
		$("#txtUserName").val("");
		$("#txtPassword").val("");
		$("#btnLogin").click(function()
		{
			$.post("LogInOperation.php",
			{
				Flag:"login",
				UserName:$("#txtUserName").val(),
				Password:$("#txtPassword").val()
			},function(data,success)
			{
				if(data == 'success')
				{
					window.location="Home.php";
				}
				else
				{
					alertify.alert(data);
				}
			});
		});
	});
</script>
<div class="container">
<br><br><br><br><br><br><br><br>
	<div class='col-md-offset-3 col-md-6 DivLogIn'>
		<div class="row">
			<div class="col-md-5">
				<label for="User Name">User Name</label>
			</div>
			<div class="col-md-5">
				<input type="text" id="txtUserName" class="form-control" autofocus></input>
			</div>		
		</div><br>
		<div class="row">
			<div class="col-md-5">
				<label for="Password">Password</label>
			</div>
			<div class="col-md-5">
				<input type="text" id="txtPassword" class="form-control"></input>
			</div>		
		</div><br>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-6">
				<button id="btnLogin" class="btn btn-danger">Login</button>
			</div>		
		</div>
	</div>
	<div class="col-md-offset-3">
	</div>
</center>
</div>