<?php
	session_start();
	if(!isset($_SESSION['Admin']))
	{
		echo "<script>window.location='login.php';</script>";
	}
?>
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function()
	{
		LoadAllStudentNames();
		LoadAllSubjectNames();
		$("#btnFindCo").click(function()
		{
			$.post("CoMatrixOperations.php",
			{
				Flag:"ShowCoDetailsStudentWise",
				StudentId:$("#lstStudentNames").val(),
				SubjectId:$("#lstSubjects").val()
			},function(data,success)
			{
				$("#DivShowDetails").html(data);
			});
		});
		$("#btnShowAll").click(function()
		{
			$.post("FetchMetaData1.php",
			{
				Flag:"ShowAll"
			},function(data,success)
			{
				$('#ModalShowAll').modal('show');
				$("#DivShowAllDetails").html(data);
			});			
		});
	});
	function LoadAllStudentNames()
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllStudentNames"
		},function(data,success)
		{
			$("#lstStudentNames").html(data);
		});
	}
	function LoadAllSubjectNames()
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllSubjectNames"
		},function(data,success)
		{
			$("#lstSubjects").html(data);
		});
	}
	function ShowCos(id)
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllCos",
			id:id
		},function(data,success)
		{
			$("#DivCourseOutcome"+id).html(data);
		});		
	}
	function LogoutMeNow()
	{
		$.post("LogInOperation.php",
		{
			Flag:"LogoutMeNow"
		},function(data,success)
		{
			window.location = "login.php";
		});		
	}
</script>
<div class="modal fade" id="ModalShowAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"> 
		<div class="modal-dialog" style='z-index:inherit;width:80%'> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
					<h4 class="modal-title" id="myModalLabel1">Change Batch</h4>
			</div> 
		<div class="modal-body">
			<div class="row">
				<div id='DivShowAllDetails'></div>
			</div>
		</div>
			</div><!-- /.modal-content --> 
 </div><!-- /.modal-dialog --> 
 </div><!-- /.modal --> 

<body style='background-color:lavender;color:#A94442'>
<div class="container" style='border:2px solid #8A6D3B;background-color:lightyellow;height:100%'>
	<center><h2><label style='border:1px solid #66FF00;border-radius:20px;padding:15px;background-color:#F5F5F5;color:cadetblue'>
	Course Outcome Attenment StudentWise</label></h2></center>
	<div class="row" style='border:2px solid #8A6D3B;padding:5px;'>
		<button class="btn btn-warning btn-xs" onclick='LogoutMeNow()' style='margin-left:1100px;'>Logout</button>
	</div>
	<br><br><br>
<div class="row">	
	<div class="col-md-7">	
			<div class="row">
				<div class="col-md-3">
					<label for="Student Name">Student Name</label>
				</div>
				<div class="col-md-4">
					<select class="form-control" id="lstStudentNames">
					</select>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Subject Name">Subject Name</label>
				</div>
				<div class="col-md-4">
					<select class="form-control" id="lstSubjects">
					</select>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Student Name">Select Co</label>
				</div>
				<div class="col-md-4">
					<label class="form-control"> </label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				<button class="btn btn-success" id="btnFindCo">Show Details</button>
				</div>
				<div class="col-md-4">
				<button class="btn btn-success" id="btnShowAll">Show All Subjects</button>	
				</div>
			</div>
			<br>
		</div>
		<div class="col-md-4" style='left:-190px;margin-top: -20px;'>
			<div id="DivShowDetails"></div>
		</div>
	</div>
</div>
</body>