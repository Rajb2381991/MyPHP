<?php
	include_once("db.php");
	$txtSelectCourse=$_POST["txtMasterCourseId"];
	$txtSelectSubCourse=$_POST["txtCourseId"];
	$txtbatch_id=$_POST["txtbatch_id"];
	$txtadmission_no=$_POST["txtadmission_no"];
	$txtclass_roll_no=$_POST["txtclass_roll_no"];
	$txtadmission_date=$_POST["txtadmission_date"];
	$txtfirst_name=$_POST["txtfirst_name"];
	$txtlast_name=$_POST["txtlast_name"];
	$txtmiddle_name=$_POST["txtmiddle_name"];
	$txtdate_of_birth=$_POST["txtdate_of_birth"];
	$txtblood_group=$_POST["txtblood_group"];
	$txtnationality_id=$_POST["txtnationality_id"];
	$txtlanguage=$_POST["txtlanguage"];
	$txtreligion=$_POST["txtreligion"];
	$txtstudent_category_id=$_POST["txtstudent_category_id"];
	$txtgender=$_POST["txtgender"];
	$txtbirth_place=$_POST["txtbirth_place"];
	$txtStudentUpdatedId=$_POST["txtStudentUpdatedId"];
	
	if($StudentUpdatedId != '')
	{
		if(mysql_query("update students set parent_id='$txtparent_id' , admission_no='$txtadmission_no',class_roll_no='$txtclass_roll_no',admission_date='$txtadmission_date',
		first_name='$txtfirst_name',middle_name='$txtmiddle_name',last_name='$txtlast_name',prn_number='$txtprn_number',MasterCourseId='$txtSelectCourse',
		CourseId='$txtSelectSubCourse',batch_id='$txtbatch_id',date_of_birth='$txtdate_of_birth',gender='$txtgender',blood_group='$txtblood_group',birth_place='$txtbirth_place',nationality_id='$txtnationality_id',
		language='$txtlanguage' ,religion='$txtreligion',student_category_id='$txtstudent_category_id',address_line1='$txtaddress_line1',address_line2='$txtaddress_line2',
		city='$txtcity',state='$txtstate',pin_code='$txtpin_code',phone1='$txtphone1',phone2='$txtphone2',email='$txtemail',immediate_contact_id='$txtimmediate_contact_id',is_sms_enabled='$txtis_sms_enabled' where id=$StudentUpdatedId"))
		{
			echo "Updated";
		}
		else
		{
			echo mysql_error();
		}
		
	}
	else
	{
		$query=mysql_query("insert into students 
			(parent_id ,admission_no,class_roll_no,admission_date,first_name,middle_name,last_name,prn_number,MasterCourseId,CourseId, 
			batch_id,date_of_birth,gender,blood_group,birth_place,nationality_id,language ,religion,student_category_id,address_line1,
			address_line2,city,state,pin_code,phone1,phone2,email,immediate_contact_id,is_sms_enabled) values 
			('$txtparent_id','$txtadmission_no','$txtclass_roll_no','$txtadmission_date','$txtfirst_name','$txtmiddle_name','$txtlast_name','$txtprn_number','$txtSelectCourse','$txtSelectSubCourse',
			'$txtbatch_id','$txtdate_of_birth','$txtgender','$txtblood_group','$txtbirth_place','$txtnationality_id','$txtlanguage','$txtreligion','$txtstudent_category_id','$txtaddress_line1'
			,'$txtaddress_line2','$txtcity','$txtstate','$txtpin_code','$txtphone1','$txtphone2','$txtemail','$txtimmediate_contact_id','$txtis_sms_enabled')");
		
				$StudentId=mysql_insert_id();
				$BatchId=$txtbatch_id;
				$queryBatch=mysql_query("select * from batch_students where student_id='$StudentId' and batch_id='$BatchId'");
				echo mysql_error();		
				if(mysql_num_rows($queryBatch)==0)
				{
					if(mysql_query("insert into batch_students(student_id,batch_id) values ($StudentId,$BatchId)"))
					{
						echo $StudentId;
					}
					else
					{
						echo mysql_error();
					}
				}
			
	}
?>