<?php
	$Flag = $_POST["Flag"];
	include_once("db.php");
	include_once("FetchTextFromId.php");
	if($Flag == 'ShowCoDetailsStudentWise')
	{
		$StudentId=$_POST["StudentId"];
		$SubjectId=$_POST["SubjectId"];
			echo "<center><h3></h3></center>";
			echo "<table class='table table-bordered table-striped'><tr><th colspan='7' style='text-align:center'>Student Course Outcome Details</th></tr><tr><th>Course Outcome</th>";
			$query=mysql_query("select name from subjects where id='$SubjectId'");
			if(mysql_num_rows($query)!=0)
			{
				while($rwFetch=mysql_fetch_array($query))
				{
					$name=$rwFetch["name"];				
					echo "<th>$name</th>";
				}
			}
			else
			{
				echo mysql_error();
			}
			echo "</tr>";
			$query = mysql_query("select * from tblcoscore where studentId='$StudentId' and subjectId='$SubjectId'");
			if(mysql_num_rows($query)!=0)
			{
				$OverAllAverage = 0;
				$Sum =0;
				while($row=mysql_fetch_array($query))
				{
					$Co1 = $row["Co1"];
					$Co2 = $row["Co2"];
					$Co3 = $row["Co3"];
					$Co4 = $row["Co4"];
					$Co5 = $row["Co5"];
					$Co6 = $row["Co6"];
					$Co7 = $row["Co7"];
				}
				$Sum = $Co1+$Co2+$Co3+$Co4+$Co5+$Co6+$Co7;
				$OverAllAverage = $Sum / 7;
				echo "<tr><td>Co1</td><td>$Co1</td>";
				echo "<tr><td>Co2</td><td>$Co2</td>";
				echo "<tr><td>Co3</td><td>$Co3</td>";
				echo "<tr><td>Co4</td><td>$Co4</td>";
				echo "<tr><td>Co5</td><td>$Co5</td>";
				echo "<tr><td>Co6</td><td>$Co6</td>";
				echo "<tr><td>Co7</td><td>$Co7</td>";			
			}
		echo "</tr>";
		echo "</tr></table>";
	}
	if($Flag == 'ShowCoMatrix')
	{
 		$assessments = array();
		$assessments[1] = "Final Exam";
		$assessments[2] = "Test";
		$assessments[3] = "Quizzes";
		$assessments[4] = "Assignments";
		$assessments[5] = "Project";
		$assessments[6] = "Special";
		
			$query1 = mysql_query("select * from tblassessments");
			echo "<table class='table table-bordered table-striped table-responsive'><tr><th>Courses</th>";
			$j=1;
			while($j < 11)
			{
				echo "<th>Co$j</th>";
				$j++;
			}
			echo "</tr>";
			$j=0;
				
			for($j=1;$j<=count($assessments);$j++)
			{
				echo "<tr><td>$assessments[$j]</td>";
				$query = mysql_query("select * from tblcomatrix where assessmentsId='$j'");
				if(mysql_num_rows($query) != 0)
				{
				
					while($rwCoMatrix=mysql_fetch_array($query))
					{				
						$Co1=$rwCoMatrix["Co1"];
						$Co2=$rwCoMatrix["Co2"];
						$Co3=$rwCoMatrix["Co3"];
						$Co4=$rwCoMatrix["Co4"];
						$Co5=$rwCoMatrix["Co5"];
						$Co6=$rwCoMatrix["Co6"];
						$Co7=$rwCoMatrix["Co7"];
						$Co8=$rwCoMatrix["Co8"];
						$Co9=$rwCoMatrix["Co9"];
						$Co10=$rwCoMatrix["Co10"];
						
						echo "<td>$Co1 %</td>";
						echo "<td>$Co2 %</td>";
						echo "<td>$Co3 %</td>";
						echo "<td>$Co4</td>";
						echo "<td>$Co5</td>";
						echo "<td>$Co6</td>";
						echo "<td>$Co7</td>";
						echo "<td>$Co8</td>";
						echo "<td>$Co9</td>";
						echo "<td>$Co10</td></tr>";
					}
				}
				else
				{
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td></tr>";
				}
			}
	}
?>