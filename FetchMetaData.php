<?php
	error_reporting(0);
	include_once('db.php');
	include_once("FetchTextFromId.php");
	$Flag=$_POST['Flag'];
	session_start();
	
	function MasterStudentDetails($MasterCourseId)
	{
		$query = "select * from students where MasterCourseId='$MasterCourseId'";
		$rstAllStudent=mysql_query($query);
		if(mysql_num_rows($rstAllStudent)!=0)
		{
				echo "<div id='DivTitle'></div><br><table class='table table-bordered table-condensed' id='tblStudentsListBatchWise' style='width:100%;'>";
				echo "<thead><tr style='color:green;'>
				<th>ParentName</th>
				<th>Student Full Name</th>
				<th>date_of_birth</th>
				<th>Address</th>
				<th>Caste</th>
				<th>Phone</th>
			</tr></thead>";				
	
				while($row=mysql_fetch_array($rstAllStudent))
				{
					
					$id=$row['id'];	
					$parent_id=$row['parent_id'];
					$first_name=$row['first_name'];
					$middle_name=$row['middle_name'];
					$last_name=$row['last_name'];
					$FullName=$first_name." ".$middle_name." ".$last_name;
					$CourseId=$row['CourseId'];
					$address_line1=$row["address_line1"];
					$batch_id=$row['batch_id'];
					$date_of_birth=$row['date_of_birth'];
					$student_category_id=$row["student_category_id"];
					$phone1=$row["phone1"];
					echo "<tr>";
					echo "<td>";
					echo Fetch("tblparents","ParentId","ParentName",$parent_id);
					echo "</td>";
					echo "<td>$FullName</td>";
					echo "<td>$date_of_birth</td>";
					echo "<td>$address_line1</td>";
					echo "<td>$student_category_id</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
				}
				echo "</table>";
		}		
	}
	function MasterCourseStudentDetails($MasterCourseId,$CourseId)
	{
		
		echo "CourseId ".$CourseId;	
		$query = "select * from students where MasterCourseId='$MasterCourseId' and CourseId='$CourseId'";
		$rstAllStudent=mysql_query($query);
		if(mysql_num_rows($rstAllStudent)!=0)
		{			
				echo "<div id='DivTitle'></div><br><table class='table table-bordered table-condensed' id='tblStudentsListBatchWise' style='width:100%;'>";
				echo "<thead>
						<tr style='color:green;'>
							<th>ParentName</th>
							<th>Student Full Name</th>
							<th>date_of_birth</th>
							<th>Address</th>
							<th>Caste</th>
							<th>Phone</th>
						</tr>
					</thead>";				
	
				while($row=mysql_fetch_array($rstAllStudent))
				{
					
					$id=$row['id'];	
					$parent_id=$row['parent_id'];
					$first_name=$row['first_name'];
					$middle_name=$row['middle_name'];
					$last_name=$row['last_name'];
					$FullName=$first_name." ".$middle_name." ".$last_name;
					$CourseId=$row['CourseId'];
					$address_line1=$row["address_line1"];
					$batch_id=$row['batch_id'];
					$date_of_birth=$row['date_of_birth'];
					$student_category_id=$row["student_category_id"];
					$phone1=$row["phone1"];
					echo "<tr>";
					echo "<td>";
					echo Fetch("tblparents","ParentId","ParentName",$parent_id);
					echo "</td>";
					echo "<td>$FullName</td>";
					echo "<td>$date_of_birth</td>";
					echo "<td>$address_line1</td>";
					echo "<td>$student_category_id</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
				}
				echo "</table>";
		}		
	}
	if($Flag == 'StudentsListBatchWise')
	{
		$BatchId=$_POST["BatchId"];
		$MasterCourseId=$_POST["MasterCourseId"];
		$CourseId=$_POST["CourseId"];
		if(MasterCourseId == '')
		{
			echo "<h2>Select Master Course Name</h2>";
		}
		else
		{
			if($MasterCourseId == 1)
			{
				$MasterCourseName="Polytechnic Engineering";
				echo "<script>$('#DivTitle').html($MasterCourseName)</script>";				
				MasterStudentDetails($MasterCourseId);
			}
			else if($MasterCourseId == 2)
			{
				$MasterCourseName="Bachlor Of Engineering";
				echo "<script>$('#DivTitle').html($MasterCourseName)</script>";
				MasterStudentDetails($MasterCourseId);
			}
			else if($MasterCourseId == 3)
			{
				$MasterCourseName="Master Of Engineering";
				echo "<script>$('#DivTitle').html($MasterCourseName)</script>";
				MasterStudentDetails($MasterCourseId);
			}
			if($CourseId == '')
			{
				
			}
			else
			{
					if($MasterCourseId == 1)
					{
						$MasterCourseName="Polytechnic Engineering";
						$rstCourseName=mysql_query("select CourseId,CourseName from tblcourse where CourseId='$CourseId'");
						if(mysql_num_rows($rstCourseName)!=0)
						{
							$rwCourseName=mysql_fetch_array($rstCourseName);			
							$CourseName=$rwCourseName["CourseName"];
							echo "<script>$('#DivTitle').html($MasterCourseName : $CourseName)</script>";
						}
						MasterCourseStudentDetails($MasterCourseId,$CourseId);
					}
					else if($MasterCourseId == 2)
					{
						$MasterCourseName="Bachlor Of Engineering";
						$rstCourseName=mysql_query("select CourseId,CourseName from tblcourse where CourseId='$CourseId'");
						if(mysql_num_rows($rstCourseName)!=0)
						{
							$rwCourseName=mysql_fetch_array($rstCourseName);			
							$CourseName=$rwCourseName["CourseName"];
							echo "<script>$('#DivTitle').html($MasterCourseName : $CourseName)</script>";
						}
						MasterCourseStudentDetails($MasterCourseId,$CourseId);
					}
					else if($MasterCourseId == 3)
					{
						$MasterCourseName="Master Of Engineering";
						$rstCourseName=mysql_query("select CourseId,CourseName from tblcourse where CourseId='$CourseId'");
						if(mysql_num_rows($rstCourseName)!=0)
						{
							$rwCourseName=mysql_fetch_array($rstCourseName);			
							$CourseName=$rwCourseName["CourseName"];
							echo "<script>$('#DivTitle').html($MasterCourseName : $CourseName)</script>";
						}
						MasterCourseStudentDetails($MasterCourseId,$CourseId);
					}

				if($BatchId == '')
				{
				}
				else
				{
					$rstBatchName=mysql_query("select id,name from batches where id='$BatchId'");
					if(mysql_num_rows($rstBatchName)!=0)
					{
						$rwBatchName=mysql_fetch_array($rstBatchName);			
						$BatchName=$rwBatchName["name"];
					}	
				}
		} 
		}
	}
	
	if($Flag == 'LastSeen')
	{
		$UserId=$_SESSION["UserId"];
		$session_id=session_id();
		$CurrentDate=date('Y-m-d H-i-s');
		if(mysql_query("update tbluserstracking set LastSeen='$CurrentDate' where SessionId='$session_id'"))
		{
			
		}
		else 
		{
			mysql_error();
		}
	}
	else if($Flag == 'LoadEmployeeList')
	{
		$DepartmentId=$_POST["DepartmentId"];
		$rstMasterCourse=mysql_query("select  from employees where employee_department_id='$DepartmentId'");
		echo "select  from employees where employee_department_id='$DepartmentId'";
		if(mysql_num_rows($rstMasterCourse)!=0)
		{
			echo "<option value=''>Select Employee</option>";
			while($rwMasterCourse=mysql_fetch_array($rstMasterCourse,MYSQL_ASSOC))
			{
				$id=$rwMasterCourse["id"];
				$first_name=$rwMasterCourse["first_name"];
				$last_name=$rwMasterCourse["last_name"];
				$middle_name=$rwMasterCourse["middle_name"];
				$Full=$first_name." ".$middle_name." ".$last_name;
				echo "<option value='$id'>$Full</option>";
			}
		}
	}
	else if($Flag == 'LoadAllMainCourse')
	{
		echo "<option value='0'>Select Course Type</option>
					<option value='1'>Polytechnic Engineering</option>
					<option value='2'>Bachlor Of Engineering</option>
					<option value='3'>Master Of Engineering</option>";
	}
	else if($Flag == 'LoadAllEmployeesByDepartment')
	{
		$DepartmentId=$_POST["DepartmentId"];
		$rstLoadEmployees=mysql_query("select id,first_name,middle_name,last_name from employees where employee_department_id='$DepartmentId'");
		if(mysql_num_rows($rstLoadEmployees)>0)
		{
			echo "<option value=''>Select Employee</option>";
			while($rwAllEmployees=mysql_fetch_array($rstLoadEmployees,MYSQL_ASSOC))
			{
				$id=$rwAllEmployees["id"];
				$first_name=$rwAllEmployees["first_name"];
				$middle_name=$rwAllEmployees["middle_name"];
				$last_name=$rwAllEmployees["last_name"];
				$FullName=$first_name." ".$middle_name." ".$last_name;
				echo "<option value='$id'>$FullName</option>";
			}
		}

	}
	else if($Flag == 'LoadAllEmployees')
	{
		$rstLoadEmployees=mysql_query("select id,first_name,middle_name,last_name from employees");
		if(mysql_num_rows($rstLoadEmployees)>0)
		{
			echo "<option value=''>Select Employee</option>";
			while($rwAllEmployees=mysql_fetch_array($rstLoadEmployees,MYSQL_ASSOC))
			{
				$id=$rwAllEmployees["id"];
				$first_name=$rwAllEmployees["first_name"];
				$middle_name=$rwAllEmployees["middle_name"];
				$last_name=$rwAllEmployees["last_name"];
				$FullName=$first_name." ".$middle_name." ".$last_name;
				echo "<option value='$id'>$FullName</option>";
			}
		}
	}
	else if($Flag == 'Login')
	{
		$Username=$_POST['UserName'];
		$Password=$_POST['Password'];
		session_start();
		$rstLogin=mysql_query("select * from tblUsers where UserName='$Username' and Password=md5('$Password')");
		echo mysql_error();
		$Isverify=0;
		if(mysql_num_rows($rstLogin)>0)
		{
			
			$row=mysql_fetch_array($rstLogin,MYSQL_ASSOC);
			$Role=$row['Role'];
			$UserId=$row['UserId'];
			$RoleId=$row['RoleId'];
			$UName=$row['UserName'];
			$CurrentDate=date('Y-m-d H-i-s');
			session_regenerate_id(true);
			$session_id=session_id();
			mysql_query("update tbluserstracking set LoggedOut='$CurrentDate' where UserId='$UserId'");
			if(mysql_query("insert into tbluserstracking(UserId,LoggedIn,LastSeen,SessionId) values
			('$UserId','$CurrentDate','$CurrentDate','$session_id')"))
			{
			}
			else
			{
				echo mysql_error();
			}
			$_SESSION["RoleId"] = $row['RoleId'];
			$_SESSION["Role"] = $row['Role'];
			$_SESSION["UserName"] = $row['UserName'];
			$rstEmployee=mysql_query("select id,employee_department_id from employees where uid='$UserId'");
			$rwEmployee=mysql_fetch_array($rstEmployee,MYSQL_ASSOC);
 			$EmployeeId=$rwEmployee["id"];
			$_SESSION["EmployeeId"]=$EmployeeId;
			$ActiveDepartmentId=$rwEmployee["employee_department_id"];	
			if($Password == '123')
			{
				$Isverify = 1;
			}
			else
			{
				$Isverify = 0;
			}
			if($Role=="Teacher")
			{
				$_SESSION["TeacherId"]=$EmployeeId;
				
			}
			else if($Role=="HOD" or $Role=="Department Operator")
			{
				$_SESSION["ActiveDepartmentId"]=$ActiveDepartmentId;
				$_SESSION["HODId"]=$EmployeeId;
				$_SESSION["TeacherId"]=$EmployeeId;
			}
			else if($Role=="Principal")
			{
				$_SESSION["PrincipalId"]=$EmployeeId;			
			}
			$_SESSION["ProjectName"] = 'BIGCE';
			$_SESSION["UserId"] = $row['UserId'];
			echo "Success-".$Isverify;
		}
		else
		{
			echo "Login Failed";
		}
	}	
	else if($Flag == 'ChangePassword')
	{
		$NewPassword=$_POST["NewPassword"];
		$UserId=$_SESSION["UserId"];
		if(mysql_query("update tblusers set Password=md5('$NewPassword') where UserId='$UserId'"))
		{
			echo "Password Changed";
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($Flag=="GenerateAdmissionNo"){
		$BatchId=$_POST["BatchId"];
		$rstBatch=mysql_query("select * from batches where id='$BatchId'");
		if(mysql_num_rows($rstBatch)!=0)
		{
			$rwBatch=mysql_fetch_array($rstBatch,MYSQL_ASSOC);
			$CourseId=$rwBatch["CourseId"];
			$rstCourse=mysql_query("select CourseCode from tblcourse where CourseId=$CourseId");
			$rwCourse=mysql_fetch_array($rstCourse,MYSQL_ASSOC);
			$CourseCode=$rwCourse["CourseCode"];
			$AcademicYearId=$rwBatch["AcademicYearId"];
			$rstAcademicYear=mysql_query("select AcademicYear from tblacademic where AcademicId=$AcademicYearId");
			$rwAcademicYear=mysql_fetch_array($rstAcademicYear,MYSQL_ASSOC);
			$AcademicYear=$rwAcademicYear["AcademicYear"];
			$rstStudentNo=mysql_query("select count(*) as TotalAdmitted from students where batch_id=$BatchId");
			$rwStudentNo=mysql_fetch_array($rstStudentNo,MYSQL_ASSOC);
			$TotalAdmitted=sprintf('%03d', $rwStudentNo["TotalAdmitted"]+1);
			$Temp="$CourseCode/$AcademicYear/$TotalAdmitted";
			echo $Temp;
		}
	}
	else if($Flag == 'FacultyListDepartmentWise')
	{
		$MasterCourseId=$_POST["MasterCourseId"];
		$query1=mysql_query("select DepartmentId from  tbldepartment where MasterCourseId=$MasterCourseId");
		echo "<table class='table table-bordered table-condensed' id='tblListGuardians' style='width:100%;'>";
		echo "<thead><tr>
			<th>Department Name</th>
			<th>Parent Name</th>
			<th>DOB</th>
			<th>Caste</th>
			<th>Mobile Phone</th>
			<th>Alternate Phone</th>
			<th>Email</th>
			<th>Address</th>
			<th>Date Of Joining</th>
			</tr></thead>";				
		if(mysql_num_rows($query1)!=0)
		{
			$rwDepartmentId=mysql_fetch_array($query1);
				
			while($rwDepartmentId=mysql_fetch_array($query1))
			{
				$DepartmentId=$rwDepartmentId["DepartmentId"];
				$query="select * from employees where employee_department_id=$DepartmentId order by employee_department_id";	
				$rstAllEmployees=mysql_query($query);
					if(mysql_num_rows($rstAllEmployees))
					{
						while($row=mysql_fetch_array($rstAllEmployees))
						{
							$employee_department_id=$row["employee_department_id"];
							$id=$row["id"];
							$Title=$row["Title"];
							$last_name=$row["last_name"];
							$first_name=$row["first_name"];
							$date_of_birth=$row["date_of_birth"];
							$middle_name=$row["middle_name"];
							$FullName=$Title." ".$first_name." ".$middle_name." ".$last_name;
							$Caste=$row["Caste"];
							$MobilePhone=$row["MobilePhone"];
							$AlternateMobilePhone=$row["AlternateMobilePhone"];
							$EmailAddress=$row["EmailAddress"];
							$DateOfJoining=$row["DateOfJoining"];
							$EnrollmentId=$row["EnrollmentId"];
							$AadhaarCard=$row["AadhaarCard"];
							echo "<tr>";
							echo "<td style='display:none;'>$id</td><td>";
							echo Fetch("tbldepartment","DepartmentId","DepartmentName",$DepartmentId);
							echo "</td><td>$FullName</td>";
							echo "<td>$date_of_birth</td><td>";
							echo Fetch("tblcastecategory","CasteId","Caste",$Caste);
							echo "</td><td>$MobilePhone</td>";
							echo "<td>$AlternateMobilePhone</td>";
							echo "<td>$EmailAddress</td>";
							echo "<td>$Address</td>";
							echo "<td>$DateOfJoining</td>";
							echo "</tr>";			
						}
					}			
			}				
		}
		echo "</table>";
	}
	else if($Flag == 'LoadStudentBatchWise')
	{
		$BatchId=$_POST["BatchId"];
		$query=mysql_query("select id,first_name,last_name,middle_name from students where batch_id='$BatchId'");
		if(mysql_num_rows($query)>0)
		{
			echo "<option value=''>Select Batch</option>";
			while($row=mysql_fetch_array($query))
			{
				$id=$row["id"];
				$first_name=$row["first_name"];
				$last_name=$row["last_name"];
				$middle_name=$row["middle_name"];
				$FullName=$first_name." ".$middle_name." ".$last_name;
				echo "<option value='$id'>$FullName</option>";
			}
		}
	}
	else if($Flag == 'LoadAllBatchInList')
	{
		$DepartmentId=$_POST["DepartmentId"];
		$query=mysql_query("select * from batches where DepartmentId='$DepartmentId'");
		if(mysql_num_rows($query)>0)
		{
			echo "<option value=''>Select Batch</option>";
			while($row=mysql_fetch_array($query))
			{
				$Id=$row['id'];
				$name=$row['name'];
				echo "<option value='$Id'>$name</option>";
			}
		}
	}
	else if($Flag == 'StudentsListBatchWise1')
	{
		$BatchId=$_POST['BatchId'];
		$MasterCourseId=$_POST["MasterCourseId"];
		$DepartmentId=$_POST["DepartmentId"];
		$query = "select * from tbldepartment where MainCourseId='$MainCourseId'";
		$rstAllStudent=mysql_query($query);
		if(mysql_num_rows($rstAllStudent))
		{
				echo "<table class='table table-bordered table-condensed' id='tblStudentsListBatchWise' style='width:100%;'>";
				echo "<thead><tr style='color:green;'>
				<th>ParentName</th>
				<th>Student Full Name</th>
				<th>date_of_birth</th>
				<th>Address</th>
				<th>Caste</th>
				<th>Phone</th>
			</tr></thead>";				
	
				while($row=mysql_fetch_array($rstAllStudent))
				{
					
					$id=$row['id'];	
					$parent_id=$row['parent_id'];
					$first_name=$row['first_name'];
					$middle_name=$row['middle_name'];
					$last_name=$row['last_name'];
					$FullName=$first_name." ".$middle_name." ".$last_name;
					$CourseId=$row['CourseId'];
					$address_line1=$row["address_line1"];
					$batch_id=$row['batch_id'];
					$date_of_birth=$row['date_of_birth'];
					$student_category_id=$row["student_category_id"];
					$phone1=$row["phone1"];
					echo "<tr>";
					echo "<td>";
					echo Fetch("tblparents","ParentId","ParentName",$parent_id);
					echo "</td>";
					echo "<td>$FullName</td>";
					echo "<td>$date_of_birth</td>";
					echo "<td>$address_line1</td>";
					echo "<td>$student_category_id</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
				}
				echo "</table>";
		}		
	}
	if($Flag == 'ListGuardians')
	{
		$query="select * from tblparents";
		$rstAllGuardian=mysql_query($query);
		if(mysql_num_rows($rstAllGuardian))
		{
				echo "<br><center><h2>Guardian List</h2></center><br>";
				echo "<table class='table table-bordered table-condensed' id='ListGuardians' style='width:100%;'>";
				echo "<thead><tr><th>ParentName</th><th>ParentOccupation</th><th>ParentContactNumber</th><th>ParentEmailId</th><th>ParentAddress</th></tr></thead>";				
			
				while($row=mysql_fetch_array($rstAllGuardian))
				{
				$ParentId=$row['ParentId'];
				$ParentName=$row['ParentName'];
				$ParentAddress=$row['ParentAddress'];
				$ParentOccupation=$row['ParentOccupation'];
				$ParentEmailId=$row['ParentEmailId'];
				$ParentContactNumber=$row['ParentContactNumber'];
				if($ParentContactNumber==0)
					{	
						echo "<tr>";
						echo "<td style='display:none;'>$ParentId</td>";
						echo "<td>$ParentName</td>";
						echo "<td>$ParentOccupation</td>";
						echo "<td>-</td>";
						echo "<td>$ParentEmailId</td>";
						echo "<td>$ParentAddress</td>";
						echo "</tr>";			
					}
				else
					{
						echo "<tr>";
						echo "<td style='display:none;'>$ParentId</td>";
						echo "<td>$ParentName</td>";
						echo "<td>$ParentOccupation</td>";
						echo "<td>$ParentContactNumber</td>";
						echo "<td>$ParentEmailId</td>";
						echo "<td>$ParentAddress</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
		}		
	}
	if($Flag == 'ShwChangeBatch')
	{
			if($_SESSION["Role"] != 'Principal')
			{
				echo "<a class='GoToPage' href='index.php?Name=ReportCourses' chref='ReportCourses' class='btn btn-warning btn-sg'><label class='form-control' style='line-height:20px;border-radius:30px;color:blue;border-color:red;border:2px solid green'>Change Batch</a></label>";
			}
			else
			{
				echo "<label class='form-control' style='line-height:20px;border-radius:30px;color:blue;border-color:red;border:2px solid green'>Change Batch</label>";
			}						
	}
	if($Flag == 'FindModuleTitle')
	{
		$Module=$_POST["Module"];
		$query=mysql_query("select PageTitle from tbluibuilder where ModuleUrl='$Module'");
		if(mysql_num_rows($query)!=0)
		{
			$row=mysql_fetch_array($query);
			$PageTitle=$row["PageTitle"];
			echo $PageTitle;
		}
	}
	
	if($Flag == 'CheckBatchExist')
	{
		if(isset($_SESSION['BatchId']))
		{
			echo "Yes";
		}
		else
		{
			echo "No";
		}
	}
	if($Flag == 'PrintWelcomeUser')
	{
		if(isset($_SESSION['UserName']))
		{
			$UserName=$_SESSION["UserName"];
			echo "Welcome&nbsp;<font color='white'>".$UserName."<br><img src='images/img.jpg' alt='...' class='img-circle profile_img' class='img-responsive'/><br>Bharat Ratna Indira Gandhi College,Solapur.</font><br><div style='width:100%;height:3px;background-color:white;margin-top:7px;'><div>";
		}
		else
		{
			echo "Welcome&nbsp;<font color='white'>&nbsp;User&nbsp;<br><img src='images/img.jpg' alt='...' class='img-circle profile_img' class='img-responsive'/><br>Bharat Ratna Indira Gandhi College,Solapur.</font><div style='width:100%;height:3px;background-color:white;margin-top:7px;'><div>";
		}
	}
		
	if($Flag == 'ShowCourse')
	{
		$query="select * from tblcourse";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<table class='table table-bordered table-condensed' id='tblCourseDetails1' style='width:100%;'>";
			echo "<thead><tr><th>College Name</th><th>Course Name</th><th>Course Code</th><th>Course Duration</th><th>Course Part </th><th>Show</th><th>Remove</th></tr></thead>";
			while($rowCourseDetail=mysql_fetch_array($$rstCollege))
			{
				$CourseId=$rowCourseDetail['CourseId'];
				$CollegeId=$rowCourseDetail['CollegeId'];

				$queryCollegeName=mysql_query("select CollegeName from tblcollege where CollegeId=$CollegeId");
				echo mysql_error();
				if(mysql_num_rows($queryCollegeName)>0)
				{
					$rowCollegeName=mysql_fetch_array($queryCollegeName);
					$CollegeName=$rowCollegeName['CollegeName'];
				}
				
				$CourseName=$rowCourseDetail['CourseName'];
				$CourseCode=$rowCourseDetail['CourseCode'];
				$CourseDurationInYears=$rowCourseDetail['CourseDurationInYears'];
				$CoursePartDuration=$rowCourseDetail['CoursePartDuration'];
				echo "<tr>";
				echo "<td id='tdCourseId$CourseId' style='display:none'>$CourseId</td>";
				echo "<td>$CollegeName</td>";
				echo "<td>$CourseName</td>";
				echo "<td>$CourseCode</td>";
				echo "<td>$CourseDuration</td>";
				echo "<td>$CoursePart</td>";
				echo "<td><button class='btn btn-success btn-xs' id='btnShowGuardian' href='#myModal' data-toggle='modal' onclick='ShowGuardian($ParentId);'>Show</button></td>";
				echo "<td><button class='btn btn-danger btn-xs' id='btnRemoveGuardian'>Remove</button></td>";				
				echo "<tr>";
			}
		}		
	}
	else if($Flag == 'AddCourse')
	{
		$MasterCourseId=$_POST["MasterCourseId"];
		$CourseName=$_POST["CourseName"];
		$CourseCode=$_POST["CourseCode"];
		$CourseDuration=$_POST["CourseDuration"];
		$CoursePart=$_POST['CoursePart'];
	 	if(mysql_query("insert into tblcourse(MasterCourseId,OrganizationId,CollegeId,CourseName,CourseCode,CourseDurationInYears,CoursePartDuration) values($MasterCourseId,1,1,'$CourseName','$CourseCode',$CourseDuration,'$CoursePart')"))
		{
			echo "success";
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($Flag == 'LoadAllGuardianList')
	{	
		$query="select ParentId,ParentName from tblparents";
		$rstAllGuardian=mysql_query($query);
		if(mysql_num_rows($rstAllGuardian))
		{
			echo "<option value=''>Select Guardian</option>";
			while($row=mysql_fetch_array($rstAllGuardian))
			{
				$ParentId=$row['ParentId'];
				$ParentName=$row['ParentName'];
				echo "<option value='$ParentId'>$ParentName</option>";
			}
		}		
	}
	else if($Flag == 'ShowGuardian')
	{
		$ParentId =$_POST['ParentId'];
		$query="select * from tblparents where ParentId=$ParentId";
		$rstAllGuardian=mysql_query($query);
		if(mysql_num_rows($rstAllGuardian))
		{
			echo "<table class='table table-bordered table-condensed' style='width:100%;'>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Occupation</th>
				<th>Contact Number</th>
				<th>E-maild</th>
				<th>Address</th>
			<tr>";
			$row=mysql_fetch_array($rstAllGuardian);
			$ParentId=$row['ParentId'];
			$ParentName=$row['ParentName'];
			$ParentOccupation=$row['ParentOccupation'];
			$ParentContactNumber=$row['ParentContactNumber'];
			$ParentEmailId=$row['ParentEmailId'];
			$ParentAddress=$row['ParentAddress'];
			if($ParentContactNumber==0)
			{
				echo "<tr>";
				echo "<td>$ParentId</td>";
				echo "<td>$ParentName</td>";
				echo "<td>$ParentOccupation</td>";
				echo "<td>-</td>";
				echo "<td>$ParentEmailId</td>";
				echo "<td>$ParentAddress</td>";
				echo "</tr>";
			}	
			else
			{
				echo "<tr>";
				echo "<td>$ParentId</td>";
				echo "<td>$ParentName</td>";
				echo "<td>$ParentOccupation</td>";
				echo "<td>$ParentContactNumber</td>";
				echo "<td>$ParentEmailId</td>";
				echo "<td>$ParentAddress</td>";
				echo "</tr>";
			}
			$query1="select * from students where parent_id=$ParentId";
			$rstAllChild=mysql_query($query1);
			if(mysql_num_rows($rstAllChild))
			{	echo "<table class='table table-bordered table-condensed' style='width:100%;'>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Department Name</th>
					<th>Course Name</th>
					<th>Phone No.</th>
				<tr>";
				$row1=mysql_fetch_array($rstAllChild);
				$id=$row1['id'];
				$first_name=$row1['first_name'];
				$last_name=$row1['last_name'];
				$phone1=$row1['phone1'];
				$CourseId=$row1['CourseId'];
				$rstCourse=mysql_query("select * from tblcourse where CourseId=$CourseId");
				$rwCourse=mysql_fetch_array($rstCourse);
				$CourseName=$rwCourse['CourseName'];
				$MasterCourseId=$row1['MasterCourseId'];
				if($MasterCourseId==2)
				{	echo "<tr>";
					echo "<td>$id</td>";
					echo "<td>$first_name $last_name</td>";
					echo "<td>$CourseName</td>";
					echo "<td>Bachlor Of Engineering</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
					echo "</table>";
				}
				else if($MasterCourseId==3)
				{	echo "<tr>";
					echo "<td>$id</td>";
					echo "<td>$first_name $last_name</td>";
					echo "<td>$CourseName</td>";
					echo "<td>Master Of Engineeringg</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
					echo "</table>";
				}
				else
				{	echo "<tr>";
					echo "<td>$id</td>";
					echo "<td>$first_name $last_name</td>";
					echo "<td>$CourseName</td>";
					echo "<td>Polytechnic Engineering</td>";
					echo "<td>$phone1</td>";
					echo "</tr>";
					echo "</table>";
				}
				
			}
			echo "</table>";
		}	
	}
	else if($Flag == 'MaxId')
	{
		$rstList= mysql_query("select MAX(ParentId) from  tblparents");
		$rwCount=mysql_fetch_array($rstList);
		$maxid=$rwCount["MAX(ParentId)"];
		if($maxid!=0)
		{
			$maxid=$maxid+1;
			echo $maxid;
		}
		else
		{
			echo "1";
		}		
	}
	else if($Flag == 'SaveGuardian')
	{
		$ParentName=$_POST['ParentName'];
		$ParentAddress=$_POST['ParentAddress'];
		$ParentOccupation=$_POST['ParentOccupation'];		
		$ParentContactNumber=$_POST['ParentContactNumber'];
		$ParentEmailId=$_POST['ParentEmailId'];
		$query="insert into tblparents(ParentName,ParentAddress,ParentOccupation,ParentContactNumber,ParentEmailId) values
		('$ParentName','$ParentAddress','$ParentOccupation','$ParentContactNumber','$ParentEmailId')";
		echo mysql_error();
		if(mysql_query($query))
		{
			$id=mysql_insert_id();
			echo "inserted-$id-$ParentName";
		}
	}
	else if($Flag == 'allGuardian')
	{
		$query="select * from tblparents";
		$rstAllGuardian=mysql_query($query);
		echo "<table><tr><td><button class='btn btn-danger btn-sm' id='btnRemoveGuardian' onclick='LoadPage(\"Guardian\");'>Add Guardian</button></td></tr></table>";
		if(mysql_num_rows($rstAllGuardian))
		{
			echo "<table class='table table-bordered table-condensed'  style='width:100%;' id='tblallGuardian'>";
			echo "<thead>
					<tr>
						<th>Parent Id</th>
						<th>Parent Name</th>
						<th>Occupation</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Address</th>
						<th>Show</th>
					</tr>
				</thead>";
			while($row=mysql_fetch_array($rstAllGuardian))
			{
				$ParentId=$row['ParentId'];
				$ParentName=$row['ParentName'];
				$ParentOccupation=$row['ParentOccupation'];
				$ParentContactNumber=$row['ParentContactNumber'];
				$ParentEmailId=$row['ParentEmailId'];
				$ParentAddress=$row['ParentAddress'];
				if($ParentContactNumber==0)
				{	echo "<tr>";
					echo "<td>$ParentId</td>";
					echo "<td>$ParentName</td>";
					echo "<td>$ParentOccupation</td>";
					echo "<td>-</td>";
					echo "<td>$ParentEmailId</td>";
					echo "<td>$ParentAddress</td>";
					echo "<td><button class='btn btn-success btn-sm' id='btnShowGuardian' href='#myModal' data-toggle='modal' onclick='ShowGuardian($ParentId);'>Show</button></td>";
					echo "</tr>";
				}
				else
				{
					echo "<tr>";
					echo "<td>$ParentId</td>";
					echo "<td>$ParentName</td>";
					echo "<td>$ParentOccupation</td>";
					echo "<td>$ParentContactNumber</td>";
					echo "<td>$ParentEmailId</td>";
					echo "<td>$ParentAddress</td>";
					echo "<td><button class='btn btn-success btn-sm' id='btnShowGuardian' href='#myModal' data-toggle='modal' onclick='ShowGuardian($ParentId);'>Show</button></td>";
					echo "</tr>";
				}
			}
			echo "</table>";
			
			
		}		
	}
	else if($Flag == 'SaveBatch')
	{
		$MasterCourseId=$_POST['MasterCourseId'];
		$DepartmentId=$_POST['DepartmentId'];
		$CourseId=$_POST['CourseId'];
		$name=$_POST['name'];
		$rsDepartmentCode=mysql_query("select DepartmentCode from tbldepartment where DepartmentId=$DepartmentId");
		$rwDepartmentCode=mysql_fetch_array($rsDepartmentCode);
		$DepartmentCode=$rwDepartmentCode["DepartmentCode"];
		
		$rsAcademicYear=mysql_query("select AcademicYear from tblacademic where AcademicId=1");
		$rwAcademicYear=mysql_fetch_array($rsAcademicYear);
		$AcademicYear=$rwAcademicYear["AcademicYear"];
		
		$BatchName=$DepartmentCode."/".$AcademicYear."/".$name;
		$query="insert into batches(MasterCourseId,OrganizationId,CollegeId,DepartmentId,CourseId,name)
	values ($MasterCourseId,1,1,$DepartmentId,$CourseId,'$BatchName')";
		
		if(mysql_query($query))
		{
			echo "success";
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($Flag == 'SaveTeacher')
	{
		$OrganizationId=$_POST['OrganizationId'];
		$CollegeId=$_POST['CollegeId'];
		$DepartmentId=$_POST['DepartmentId'];
		$CourseId=$_POST['CourseId'];
		$query="insert into batches(OrganizationId,CollegeId,DepartmentId,CourseId) values ($OrganizationId,$CollegeId,$DepartmentId,$CourseId)";
		if(mysql_query($query))
		{
			echo "Inserted";
		}
		else
		{
			echo mysql_error();
		}
	}

	else if($Flag == 'LoadAllCourseMainCourseWise')
	{
		$MasterCourseId=$_POST["MasterCourseId"];
		$query="select CourseId ,CourseName from tblcourse where MasterCourseId=$MasterCourseId";
		$rstCollege=mysql_query($query);
		echo "<option value='0'>Select Course</option>";
		if(mysql_num_rows($rstCollege))
		{
			while($row=mysql_fetch_array($rstCollege))
			{
				$CourseId=$row['CourseId'];
				$CourseName=$row['CourseName'];
				echo "<option value='$CourseId'>$CourseName</option>";
			}
		}
		
		$query="select CourseId, CourseName from tblcourse where MasterCourseId=$MasterCourseId";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
		//	echo "<option value=''>Select Course</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$CourseId=$row['CourseId'];
				$CourseName=$row['CourseName'];
			//	echo "<option value='$CourseId'>$CourseName</option>";
			}
		}		
	}
	else if($Flag == 'LoadAllTeacherDetail')
	{
		$OrganizationId=$_POST['OrganizationId'];
		$CollegeId=$_POST['CollegeId'];
		$query="select TeacherId, TeacherName from tblteacher where OrganizationId='$OrganizationId' and CollegeId='$CollegeId'";
		$rstCollege=mysql_query($query);
		echo mysql_error();
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''>Select Teacher</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$TeacherId=$row['TeacherId'];
				$TeacherName=$row['TeacherName'];
				echo "<option value='$TeacherId'>$TeacherName</option>";
			}
		}
	}

	else if($Flag == 'LoadAllCourses')
	{
		$query="select CourseId,CourseName from tblcourse";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''>Select Course</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$CourseId=$row['CourseId'];
				$CourseName=$row['CourseName'];
				echo "<option value='$CourseId'>$CourseName</option>";
			}
		}
	}
	else if($Flag == 'LoadAllTeacher')
	{
		$query="select TeacherId,TeacherName from tblteacher";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''>Select Teacher</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$TeacherId=$row['TeacherId'];
				$TeacherName=$row['TeacherName'];
				echo "<option value='$TeacherId'>$TeacherName</option>";
			}
		}
	}


	else if($Flag == 'LoadAllOrganization')
	{
		$query="select OrganizationId,OrganizationName from tblorganization";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''>Select Organization</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$OrganizationId=$row['OrganizationId'];
				$OrganizationName=$row['OrganizationName'];
				echo "<option value=$OrganizationId>$OrganizationName</option>";
			}
		}
	}
	else if($Flag == 'LoadAllCollege')
	{
		$query="select CollegeId,CollegeName from tblcollege";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''> Select College Name </option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$CollegeName=$row['CollegeName'];
				$CollegeId=$row['CollegeId'];
				echo "<option value=$CollegeId>$CollegeName</option>";
			}
		}
	}
	
	else if($Flag == 'LoadAllDepartment')
	{
		$query="select DepartmentId,DepartmentName from tbldepartment";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value='Select Department Name'>Select Department Name</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$DepartmentName=$row['DepartmentName'];
				$DepartmentId=$row['DepartmentId'];
				echo "<option value=$DepartmentId>$DepartmentName</option>";
			}
		}
	}
	else if($Flag == 'LoadAllBatchesDeptWise')
	{
		$DepartmentId=$_POST["DepartmentId"];
		$query="select id,name from batches where DepartmentId = '$DepartmentId'";
		$rstCollege=mysql_query($query);
		echo $query;
		if(mysql_num_rows($rstCollege))
		{
			echo "<option value=''>Select Batch</option>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$id=$row['id'];
				$name=$row['name'];
				echo "<option value='$id'>$name</option>";
			}
		}
	}
	
	else if($Flag == 'ShowBatch')
	{
		$OrganizationId=$_POST['OrganizationId'];
		$MasterCourseId=$_POST["MasterCourseId"];
		$CollegeId=$_POST['CollegeId'];
		$DepartmentId=$_POST['DepartmentId'];
		$query="select * from batches where MasterCourseId=$MasterCourseId and  DepartmentId=$DepartmentId";
		$rstCollege=mysql_query($query);
		echo mysql_error();
		if(mysql_num_rows($rstCollege))
		{
			$Role=$_SESSION["Role"];
			if($Role == 'Administrator' or $Role == 'HOD')
			{
				echo "<center><h2>Batches</h2></center>";
				echo "<table class='table table-bordered table-condensed' id='tblBatchList' style='width:480%;'>";
				echo "<thead><tr><th>Course Name</th><th style='display:none;'>Academic Year Id</th><th>Batch Name</th><th>Manage ALL</th></tr></thead>";
				while($row=mysql_fetch_array($rstCollege))
				{
					$BatchId=$row['id'];
					$CollegeId=$row['CollegeId'];
					$DepartmentId=$row['DepartmentId'];
					$OrganizationId=$row['OrganizationId'];
					$CourseId=$row['CourseId'];
					$name=$row['name'];
					$AcademicYearId=$row["AcademicYearId"];
					$rstAcademicYear=mysql_query("select AcademicYear from tblacademic where AcademicId=$AcademicYearId");
					if(mysql_num_rows($rstAcademicYear)!=0)
					{
						$rwAcademicYear=mysql_fetch_array($rstAcademicYear);
						$AcademicYear=$rwAcademicYear["AcademicYear"];
					}
					$query="select CourseName from tblcourse where CourseId='$CourseId'";
					$rsCourseName=mysql_query($query);
					$rowCName=mysql_fetch_array($rsCourseName);
						$CourseName=$rowCName['CourseName'];

					echo "<tr>";
					echo "<td>$CourseName</td>";
					echo "<td style='display:none;'>$AcademicYear</td>";
					echo "<td>$name</td>";
					echo "<td><button class='btn btn-success btn-xs' id='btnManageCourse' onclick='ManageCourse($BatchId);'>Manage</button></td></tr>";
				}
			}
			else
			{
				echo "<center><h2>Batches</h2></center>";
				echo "<table class='table table-bordered table-condensed' id='tblBatchList' style='width:480%;'>";
				echo "<thead><tr><th>Course Name</th><th style='display:none;'>Academic Year Id</th><th>Batch Name</th></tr></thead>";
				while($row=mysql_fetch_array($rstCollege))
				{
					$BatchId=$row['id'];
					$CollegeId=$row['CollegeId'];
					$DepartmentId=$row['DepartmentId'];
					$OrganizationId=$row['OrganizationId'];
					$CourseId=$row['CourseId'];
					$name=$row['name'];
					$AcademicYearId=$row["AcademicYearId"];
					$rstAcademicYear=mysql_query("select AcademicYear from tblacademic where AcademicId=$AcademicYearId");
					if(mysql_num_rows($rstAcademicYear)!=0)
					{
						$rwAcademicYear=mysql_fetch_array($rstAcademicYear);
						$AcademicYear=$rwAcademicYear["AcademicYear"];
					}
					$query="select CourseName from tblcourse where CourseId='$CourseId'";
					$rsCourseName=mysql_query($query);
					$rowCName=mysql_fetch_array($rsCourseName);
						$CourseName=$rowCName['CourseName'];

					echo "<tr>";
					echo "<td>$CourseName</td>";
					echo "<td style='display:none;'>$AcademicYear</td>";
					echo "<td>$name</td></tr>";		
				}
			}
			echo "</table>";
		}
	}
	else if($Flag == 'AddDepartment')
	{
		$MasterCourseId=$_POST["MainCourseId"];
		$DepartmentCode=$_POST['DepartmentCode'];
		$DepartmentName=$_POST['DepartmentName'];
		$query="insert into tbldepartment(MasterCourseId,OrganizationId,CollegeId,DepartmentCode,DepartmentName) values($MasterCourseId,1,1,'$DepartmentCode','$DepartmentName')";	
		echo mysql_error();
		if(mysql_query($query))
		{
			echo "success";
		}
		else{
			echo mysql_error();
		}
	}
	else if($Flag == 'ShowDepartment')
	{	
		$OrganizationId=$_POST['OrganizationId'];
		$CollegeId=$_POST['CollegeId'];
		$query="select * from tbldepartment where OrganizationId=$OrganizationId and CollegeId=$CollegeId";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege)>0)
		{
			echo "<b>Departments</b>";
			echo "<table class='table table-condensed' id='tblDepartmentDetails' style='width:100%;'>";
			echo "<thead><tr><th>Department Code</th><th>Department Name</th><th>AddBatch</th><th>AddTeacher</th><th>ShowBatch</th></tr></thead>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$CollegeId=$row['CollegeId'];
				$DepartmentId=$row['DepartmentId'];
				$OrganizationId=$row['OrganizationId'];
				$DepartmentName=$row['DepartmentName'];
				$DepartmentCode=$row['DepartmentCode'];
				echo "<tr><td style='display:none;'>$DepartmentId</td>";
				echo "<td style='display:none;'>$OrganizationId</td>";
				echo "<td style='display:none;'>$CollegeId</td>";
				echo "<td>$DepartmentCode</td>";
				echo "<td>$DepartmentName</td>";
			echo "<td><button  class='btn btn-success btn-xs' href='#myModalBatch' data-toggle='modal' 
			id='btnAddBatch$OrganizationId$CollegeId' onclick='AddBatch($OrganizationId,$CollegeId,$DepartmentId)'>Add Batch</button></td>";
			echo "<td><button  class='btn btn-success btn-xs' href='#myModalTeacher' data-toggle='modal' id='btnAddTeacher$OrganizationId$CollegeId' onclick='AddTeacher($OrganizationId,$CollegeId,$DepartmentId)'>Add Teacher</button></td>";
			echo "<td><button  class='btn btn-warning btn-xs' id='btnAddBatch$OrganizationId$CollegeId$DepartmentId' onclick='ShowBatch($OrganizationId,$CollegeId,$DepartmentId)'>Show Batch</button></td></tr>";
		}
		echo "</table>";
		}
		echo "<div id='divShowBatch'></div>";
	}
	else if($Flag == "FetchDepartmentDetails")
	{
		$CName=$_POST['CourseName'];		
		$MainCourseId;
		$query="select * from tblcourse where MasterCourseId=$CName";
		$rstCollege=mysql_query($query);	
		if(mysql_num_rows($rstCollege))
		{			
				echo "<br><br><center><h2>Course Details</h2></center>";
				echo "<table class='table table-bordered table-condensed' id='tbldept' style='padding:0px;width:100%;'>";
				echo "<thead><tr><th>Course Name</th><th>Course Code</th><th>Course Durati In Years</th><th>Course Type</th><th>Start Year</th></tr></thead>";
			
				while($row=mysql_fetch_array($rstCollege))
				{
					
					$CollegeId=$row['CollegeId'];		
					$queryCollegeName=mysql_query("select CollegeName from tblcollege where CollegeId=$CollegeId");
					echo mysql_error();
					if(mysql_num_rows($queryCollegeName)>0)
					{
						$rowCollegeName=mysql_fetch_array($queryCollegeName);
						$CollegeName=$rowCollegeName['CollegeName'];
					}
					$CourseName=$row['CourseName'];
					$CourseCode=$row['CourseCode'];
					$CourseDurationInYears=$row['CourseDurationInYears'];
					$CourseType=$row["CourseType"];
					$StartYear=$row["StartYear"];
					
					echo "<tr><td style='display:none;'>$CollegeId</td>";
					echo "<td>$CourseName</td>";
					echo "<td>$CourseCode</td>";
					echo "<td>$CourseDurationInYears</td>";
					echo "<td>$CourseType</td>";
					echo "<td>$StartYear</td></tr>";
				
				}
				echo "</table><br><br>";
		}		

		
		$query="select * from tbldepartment where MasterCourseId=$CName";
		$rstCollege=mysql_query($query);

		if(mysql_num_rows($rstCollege))
		{
			if($_SESSION["Role"] != 'Principal')
			{
				echo "<center><h2>Department Details</h2></center>";
				echo "<table class='table table-bordered table-condensed' id='tblcourse' style='padding:0px;width:100%;'>";
				echo "<thead><tr><th>College Name</th><th>Department Name </th><th>Department Code</th><th>Add</th><th>Show</th></tr></thead>";
			
				while($row=mysql_fetch_array($rstCollege))
				{
					$DepartmentId=$row['DepartmentId'];
					$CollegeId=$row['CollegeId'];		
					$queryCollegeName=mysql_query("select CollegeName from tblcollege where CollegeId=$CollegeId");
					echo mysql_error();
					if(mysql_num_rows($queryCollegeName)>0)
					{
						$rowCollegeName=mysql_fetch_array($queryCollegeName);
						$CollegeName=$rowCollegeName['CollegeName'];
					}
					$DepartmentName=$row['DepartmentName'];
					$DepartmentCode=$row['DepartmentCode'];
					echo "<tr><td style='display:none;'>$DepartmentId</td>";
					echo "<td>$CollegeName</td>";
					echo "<td>$DepartmentName</td>";
					echo "<td>$DepartmentCode</td>";
					echo "<td><button id='btnEdit$DepartmentId' class='btn btn-danger btn-xs' onclick='AddBatch($CollegeId,$DepartmentId)'>Add Batch</button></td><td><button id='btnEdit$DepartmentId' class='btn btn-danger btn-xs' onclick='ShowBatch(1,$CollegeId,$DepartmentId)'>Show Batch</button></td></tr>";
					echo "<tr><td colspan='5'><div id='ShowBatch1$CollegeId$DepartmentId'></td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<table class='table table-bordered table-condensed' id='tblcourse' style='padding:0px;width:100%;'>";
				echo "<thead><tr><th>College Name</th><th>Department Name </th><th>Department Code</th><th>Show</th></tr></thead>";
			
				while($row=mysql_fetch_array($rstCollege))
				{
					$DepartmentId=$row['DepartmentId'];
					$CollegeId=$row['CollegeId'];		
					$queryCollegeName=mysql_query("select CollegeName from tblcollege where CollegeId=$CollegeId");
					echo mysql_error();
					if(mysql_num_rows($queryCollegeName)>0)
					{
						$rowCollegeName=mysql_fetch_array($queryCollegeName);
						$CollegeName=$rowCollegeName['CollegeName'];
					}
					$DepartmentName=$row['DepartmentName'];
					$DepartmentCode=$row['DepartmentCode'];
					echo "<tr><td style='display:none;'>$DepartmentId</td>";
					echo "<td>$CollegeName</td>";
					echo "<td>$DepartmentName</td>";
					echo "<td>$DepartmentCode</td>";
					//echo "<td><button id='btnEdit$DepartmentId' class='btn btn-danger btn-xs' onclick='AddBatch($CollegeId,$DepartmentId)'>Add Batch</button></td>";
					echo "<td><button id='btnEdit$DepartmentId' class='btn btn-danger btn-xs' onclick='ShowBatch(1,$CollegeId,$DepartmentId)'>Show Batch</button></td></tr>";
				}
				echo "</table>";				
			}
			echo "<div id='divShowBatch'></div>";
		}		
	}
	else if($Flag == 'FetchBatchDetails')
	{
		$query="select * from batches";
		$rstCollege=mysql_query($query);
		if(mysql_num_rows($rstCollege))
		{
			echo "<table class='table bordered' style='width:100%;'>";
			echo "<thead><tr><th>Batch Id</th><th>Organization Id</th><th>College Id</th><th>Course Id</th><th>Academic Year Id</th><th>Status</th></tr></thead>";
			while($row=mysql_fetch_array($rstCollege))
			{
				$BatchId=$row['id'];
				$OrganizationId=$row['OrganizationId'];
				$CollegeId=$row['CollegeId'];
				$CourseId=$row['CourseId'];
				$AcademicYearId=$row['AcademicYearId'];
				$Status=$row['Status'];
				echo "<tr><td>$BatchId</td>";
				echo "<td>$OrganizationId</td>";
				echo "<td>$CollegeId</td>";
				echo "<td>$CourseId</td>";
				echo "<td>$AcademicYearId</td>";
				echo "<td>$Status</td>";
				echo "<td><button id='btnEdit$CollegeId$BatchId' class='btn btn-warning btn-xs' onclick='EditBatchContent($CollegeId,$BatchId)'>Edit</button></td></tr>";
			}
			echo "</table>";
		}
	}

?>