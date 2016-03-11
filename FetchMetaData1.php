<?php
	$Flag = $_POST["Flag"];
	include_once('db.php');
	if($Flag == 'LoadAllCos')
	{
		$id=$_POST["id"];
		$query1 = mysql_query("select * from tblcoscore where studentId='$id'");
		if(mysql_num_rows($query1)!=0)
		{
		echo "<table class='table table-bordered table-striped table-condensed'>
			<thead>
				<tr>
					<th>Subject Name</th>
					<th>Co1</th>
					<th>Co2</th>
					<th>Co3</th>
					<th>Co4</th>
					<th>Co5</th>
					<th>Co6</th>
					<th>Co7</th>
				</tr>
			</thead>";
	
			while($row1=mysql_fetch_array($query1))
			{
				$studentId=$row1["studentId"];
				$subjectId=$row1["subjectId"];
				$query=mysql_query("select id,name from subjects where id='$subjectId'");
				if(mysql_num_rows($query)!=0)
				{
					$row=mysql_fetch_array($query);
					$name=$row["name"];
				}
				else
				{
					$name="";
				}
				$Co1=$row1["Co1"];
				$Co2=$row1["Co2"];
				$Co3=$row1["Co3"];
				$Co4=$row1["Co4"];
				$Co5=$row1["Co5"];
				$Co6=$row1["Co6"];
				$Co7=$row1["Co7"];
				echo "</tr><td>$name</td>";
				echo "<td>$Co1</td>";
				echo "<td>$Co2</td>";
				echo "<td>$Co3</td>";
				echo "<td>$Co4</td>";
				echo "<td>$Co5</td>";
				echo "<td>$Co6</td>
				      <td>$Co7</td>
				</tr>";
			}
		}
	}
	else if($Flag == 'ShowAll')
	{
		$query = mysql_query("select id,class_roll_no,first_name,middle_name,last_name,gender from students");
		if(mysql_num_rows($query)!=0)
		{
			echo "<table class='table table-bordered table-striped table-condensed'>
			<thead><tr><th>Roll No</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Gender</th><th>Show Co's</th></tr></thead>";
			while($row = mysql_fetch_array($query))
			{
				$id = $row['id'];
				$class_roll_no = $row['class_roll_no'];
				$first_name = $row['first_name'];
				$middle_name= $row['middle_name'];
				$last_name = $row ['last_name'];
				$gender = $row['gender'];
				echo "<tr><td style='display:none;'>$id</td>";
				echo "<td>$class_roll_no</td>";
				echo "<td>$first_name</td>";
				echo "<td>$middle_name</td>";
				echo "<td>$last_name</td>";
				echo "<td>$gender</td>";
				echo "<td><button class='btn btn-warning' onclick='ShowCos($id)'>Show Cos</button></td></tr>";
				echo "<tr><td colspan='6'><div id='DivCourseOutcome$id'></td></tr>";
			}
			echo "</table>";
		}
	}
	else if($Flag == 'LoadAllScoreIfExist')
	{
		$StudentId=$_POST["StudentId"];
		$SubjectId=$_POST["SubjectId"];
		$query = mysql_query("select * from tblcoscore where subjectId='$SubjectId' and studentId='$StudentId'");
		if(mysql_num_rows($query)!=0)
		{
			$row = mysql_fetch_array($query);
			$arr[0] = $row ['studentId'];
			$arr[1] = $row ['subjectId'];
			$arr[2] = $row ['Co1'];
			$arr[3] = $row ['Co2'];
			$arr[4] = $row ['Co3'];
			$arr[5] = $row ['Co4'];
			$arr[6] = $row ['Co5'];
			$arr[7] = $row ['Co6'];
			$arr[8] = $row ['Co7'];
			echo $arr[0]."##".$arr[1]."##".$arr[2]."##".$arr[3]."##".$arr[4]."##".$arr[5]."##".$arr[6]."##".$arr[7]."##".$arr[8];	
		}
		else
		{
			echo "NotExist";
		}
	}
	else if($Flag == 'StoreCoScore')
	{
		$StudentId=$_POST["StudentId"];
		$SubjectId=$_POST["SubjectId"];
		$Co1=$_POST["Co1"];
		$Co2=$_POST["Co2"];
		$Co3=$_POST["Co3"];
		$Co4=$_POST["Co4"];
		$Co5=$_POST["Co5"];
		$Co6=$_POST["Co6"];
		$Co7=$_POST["Co7"];
		if(mysql_query("insert into tblcoscore(studentId,subjectId,Co1,Co2,Co3,Co4,Co5,Co6,Co7) values ('$StudentId','$SubjectId','$Co1','$Co2','$Co3','$Co4','$Co5','$Co6','$Co7')"))
		{
			echo "Inserted";
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($Flag == 'LoadAllStudentNames')
	{
		$query=mysql_query("select id,first_name,last_name,middle_name from students");
		if(mysql_num_rows($query)!=0)
		{
			echo "<option value=''>Select Student</option>";
			while($row=mysql_fetch_array($query))
			{
				$id=$row["id"];
				$first_name=$row["first_name"];
				$last_name=$row["last_name"];
				$middle_name=$row["middle_name"];
				echo "<option value='$id'>$first_name $middle_name $last_name</option>";
			}
		}
	}
	else if($Flag == 'LoadAllSubjectNames')
	{
		$query=mysql_query("select id,name from subjects");
		if(mysql_num_rows($query)!=0)
		{
			echo "<option value=''>Select Subject</option>";
			while($row=mysql_fetch_array($query))
			{
				$id=$row["id"];
				$name=$row["name"];
				echo "<option value='$id'>$name</option>";
			}
		}
	}
	else if($Flag == 'LoadAllStudentNamesToStore')
	{
		$query=mysql_query("select id,first_name,last_name,middle_name from students");
		if(mysql_num_rows($query)!=0)
		{
			echo "<option value=''>Select Student</option>";
			while($row=mysql_fetch_array($query))
			{
				$id=$row["id"];
				$first_name=$row["first_name"];
				$last_name=$row["last_name"];
				$middle_name=$row["middle_name"];
				echo "<option value='$id'>$first_name $middle_name $last_name</option>";
			}
		}
	}
	else if($Flag == 'LoadAllSubjectNamesToStore')
	{
		$StudentId = $_POST["StudentId"];
		$query=mysql_query("select id,name from subjects where id NOT IN (select subjectId from tblcoscore where StudentId='$StudentId')");
		if(mysql_num_rows($query)!=0)
		{
			echo "<option value=''>Select Subject</option>";
			while($row=mysql_fetch_array($query))
			{
				$id=$row["id"];
				$name=$row["name"];
				echo "<option value='$id'>$name</option>";
			}
		}
	}
	
?>