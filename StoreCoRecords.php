<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="alertify.js"></script>
<script>
	$(document).ready(function()
	{
		LoadAllStudentNames();
		$("#btnStoreCoScore").click(function()
		{
			$.post("FetchMetaData1.php",
			{
				Flag:"StoreCoScore",
				StudentId:$("#lstStudentNames").val(),
				SubjectId:$("#lstSubjects").val(),
				Co1:$("#txtCourseOutcome1").val(),
				Co2:$("#txtCourseOutcome2").val(),
				Co3:$("#txtCourseOutcome3").val(),
				Co4:$("#txtCourseOutcome4").val(),
				Co5:$("#txtCourseOutcome5").val(),
				Co6:$("#txtCourseOutcome6").val(),
				Co7:$("#txtCourseOutcome7").val()
			},function(data,success)
			{
				alertify.success(data);
			});
		});
		$("#lstStudentNames").change(function()
		{
			LoadAllSubjectNames();
		});
		$("#lstSubjects").change(function()
		{
			ClearAll();
			EnabledAll();
			LoadAllScoreIfExist();
		});
	});
	function LoadAllScoreIfExist()
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllScoreIfExist",
			StudentId:$("#lstStudentNames").val(),
			SubjectId:$("#lstSubjects").val()
		},function(data,success)
		{
			if(data == 'NotExist')
			{
			}
			else
			{
				var arr = new Array();
				arr = data.split('##');
				$('#lstStudentNames').val(arr[0]);
				$('#lstSubjects').val(arr[1]);
				$('#txtCourseOutcome1').val(arr[2]);
				$('#txtCourseOutcome2').val(arr[3]);
				$('#txtCourseOutcome3').val(arr[4]);
				$('#txtCourseOutcome4').val(arr[5]);
				$('#txtCourseOutcome5').val(arr[6]);
				$('#txtCourseOutcome6').val(arr[7]);
				$('#txtCourseOutcome7').val(arr[8]);
				disabledAll();
			}
		});
	}
	function disabledAll()
	{
		$('input').attr('disabled','true');
	}
	function ClearAll()
	{
		$('input').val('');
	}
	function EnabledAll()
	{
		$('input').removeAttr('disabled');
	}
	function LoadAllStudentNames()
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllStudentNamesToStore"
		},function(data,success)
		{
			$("#lstStudentNames").html(data);
		});
	}
	function LoadAllSubjectNames()
	{
		$.post("FetchMetaData1.php",
		{
			Flag:"LoadAllSubjectNames",
			StudentId:$("#lstStudentNames").val()
		},function(data,success)
		{
			$("#lstSubjects").html(data);
		});
	}
</script>

<div class='container' style='background-color:lightyellow;height:100%;'>
	<center>
		<h2>
			<label style='border:1px solid #66FF00;border-radius:20px;padding:15px;background-color:#F5F5F5;color:cadetblue'>
				Student Course Outcome Form
			</label>
		</h2>
	</center>
	
	<div class="row" style='border:2px solid #DFF0D8;padding:5px;'>
		<button class="btn btn-warning btn-xs" onclick='LogoutMeNow()' style='margin-left:1100px;'>Logout</button>
	</div>
	<br>
	<div class="row" style='border:2px solid #DFF0D8;border-radius:30px;padding:30px;'>
		<div class="col-md-offset-4">
			<div class="row">
				<div class="col-md-3">
					<label for="Student Name">Student Full Name</label>
				</div>
				<div class="col-md-4">
					<select class="form-control" id="lstStudentNames" autofocus>
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
					<label for="Course Outcome 1">Course Outcome 1</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome1" min="0" class="form-control" ></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 2</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome2" min="0" class="form-control"></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 3</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome3" min="0" class="form-control" ></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 4</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome4" min="0" class="form-control" ></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 5</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome5" min="0" class="form-control" ></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 6</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome6" min="0" class="form-control" ></input>
				</div>				
			</div><br>
			<div class="row">
				<div class="col-md-3">
					<label for="Course Outcome 1">Course Outcome 7</label>
				</div>
				<div class="col-md-4">
					<input type="number" id="txtCourseOutcome7" min="0" class="form-control" ></input>
				</div>				
			</div><br>			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-4"><button class="btn btn-success" id="btnStoreCoScore">Save</button></div>
			</div>
		</div>
	</div>
	<div class="col-md-offset-4"></div>
</div>