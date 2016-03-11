<?php
	include_once("db.php");
	session_start();
	error_reporting(0);
	$Flag=$_REQUEST["Flag"];
	if($Flag=="getMaxId")
	{
		$Table=$_REQUEST['Table'];
		$IDField=$_REQUEST['IDField'];
		$rstMaxId=mysql_query("select MAX($IDField) as MaxId from $Table");
		if(mysql_num_rows($rstMaxId)!=0)
		{
			$rwMaxId=mysql_fetch_array($rstMaxId,MYSQL_ASSOC);
			$MaxId=$rwMaxId["MaxId"];
			echo $MaxId;
		}
		else
		{
			echo "1";
		}
	}
	else if($Flag=="SetBatchId")
	{
		$BatchId=$_REQUEST["BatchId"];
		$_SESSION["BatchId"]=$BatchId;
		echo "BatchId Set To $BatchId";
	}
	else if($Flag=="getList")
	{
		$srno=0;
		$Table=$_REQUEST['Table'];
		$ValueField=$_REQUEST['ValueField'];
		$DisplayField=$_REQUEST['DisplayField'];
		$rstList=mysql_query("select $ValueField,$DisplayField from $Table");
		if(mysql_num_rows($rstList)!=0)
		{
			
			while($rwList=mysql_fetch_array($rstList,MYSQL_ASSOC))
			{	$srno++;
				$Value=$rwList[$ValueField];
				$Display=$rwList[$DisplayField];
				echo "<option value='$Value'>$Display</option>";
			}
		}
	}
	else if($Flag == 'LoadAllCourses')
	{
		$rstList=mysql_query("select MasterCourseId from tblcourse group by MasterCourseId ");
		if(mysql_num_rows($rstList)!=0)
		{
			echo "<option value='' disabled selected>Select Course</option>";
			while($rwList=mysql_fetch_array($rstList))
			{
				$MasterCourseId=$rwList["MasterCourseId"];
					if($MasterCourseId == 1){
						$MasterCourseName="Polytechnic Engineering";
					}
					else if($MasterCourseId == 2){
						$MasterCourseName="Bachelor Of Engineering";
					}
					else if($MasterCourseId == 3){
						$MasterCourseName="Master Of Engineering";
					}
				
				$query=mysql_query("Select CourseId,CourseName from tblcourse where MasterCourseId=$MasterCourseId");	
				echo "<optgroup label='$MasterCourseName'>";
				if(mysql_num_rows($query)!=0)
				{
					while($rwList=mysql_fetch_array($query))
					{
						$CourseId=$rwList["CourseId"];
						$CourseName=$rwList["CourseName"];				
						echo "<option value=$CourseId>$CourseName</option>";
					}
					
				}
				echo "</optgroup>";
			}
			
		}
	}

	else if($Flag == 'LoadAllDepartment')
	{
		$rstList=mysql_query("select MasterCourseId from tblcourse group by MasterCourseId ");
		if(mysql_num_rows($rstList)!=0)
		{
			echo "<option value='' disabled selected>Select Department</option>";
			while($rwList=mysql_fetch_array($rstList))
			{
				$MasterCourseId=$rwList["MasterCourseId"];
					if($MasterCourseId == 1){
						$MasterCourseName="Polytechnic Engineering";
					}
					else if($MasterCourseId == 2){
						$MasterCourseName="Bachlor Of Engineering";
					}
					else if($MasterCourseId == 3){
						$MasterCourseName="Master Of Engineering";
					}
				$query=mysql_query("Select DepartmentId,DepartmentName from tbldepartment where MasterCourseId=$MasterCourseId");	
				echo "<optgroup label='$MasterCourseName'>";
				if(mysql_num_rows($query)!=0)
				{
					while($rwList=mysql_fetch_array($query))
					{
						$DepartmentId=$rwList["DepartmentId"];
						$DepartmentName=$rwList["DepartmentName"];				
						echo "<option value=$DepartmentId>$DepartmentName</option>";
					}		
				}
				echo "</optgroup>";
			}	
		}		
	}
	else if($Flag=="getListByCondition")
	{
		$Table=$_REQUEST['Table'];
		$ValueField=$_REQUEST['ValueField'];
		$DisplayField=$_REQUEST['DisplayField'];
		$ConditionField=$_REQUEST['ConditionField'];
		$ConditionValue=$_REQUEST['ConditionValue'];
		$rstList=mysql_query("select $ValueField,$DisplayField from $Table where $ConditionField=$ConditionValue");
		if(mysql_num_rows($rstList)!=0)
		{
			echo "<option value='' disabled selected>Select $DisplayField</option>";
			while($rwList=mysql_fetch_array($rstList,MYSQL_ASSOC))
			{
				$Value=$rwList[$ValueField];
				$Display=$rwList[$DisplayField];
				echo "<option value='$Value'>$Display</option>";
			}
		}
		else
		{
			echo mysql_error();
		}
	}
	else if($Flag=="MarkAsRead")
	{
		$NotificationId=$_REQUEST["NotificationId"];
		if(mysql_query("update tblNotification set Status='Read' where NotificationId=$NotificationId"))
		{
			echo "Success";
		}
		else
		{
			echo mysql_error();
		}
	}
?>