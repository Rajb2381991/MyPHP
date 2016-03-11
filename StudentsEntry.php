<?php 
	include_once("Header.php");
?>
<script src="StudentsEntry.js"></script>
<div class="container"  class='success' style='border:2px solid #0FF;border-radius:20px;padding:30px;margin-top:40px;'>
		<div class="row"><br><br><br>
				<div class="col-md-2">
					Main Course <span class="required">*</span>
				</div>
				<div class="col-md-3">
					<select class="form-control" id="txtMasterCourseId" name='txtMasterCourseId'>
						<option value="0">Select Course Type</option>
						<option value="1">Polytechnic Engineering</option>
						<option value="2">Bachlor Of Engineering</option>
						<option value="3">Master Of Engineering</option>
					</select>
				</div>
				<div class="col-md-2">
					Course <span class="required">*</span>
				</div>
				<div class="col-md-3">
				   <select class="form-control" id="txtCourseId" name="txtCourseId" >
					</select>
				</div>			
			</div><br>
			<div class="row">
				<div class="col-md-2">
					Select Batch
				</div>
				<div class="col-md-3">
					<select class="form-control" id="txtbatch_id" name="txtbatch_id">	
					</select>
				</div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Admission No. <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtadmission_no" name="txtadmission_no"  />
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Class Roll No. <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtclass_roll_no" name="txtclass_roll_no" >
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Date Of Admission <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="date" id="txtadmission_date" class='form-control' name="txtadmission_date">
                </div>
            </div>
	
			<br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Student First Name <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtfirst_name" name="txtfirst_name" >
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Student Middle Name <span class="required">*</span>:</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtmiddle_name" name="txtmiddle_name" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Last Name  <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtlast_name" name="txtlast_name" >
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Date Of Birth <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="date" id="txtdate_of_birth" name="txtdate_of_birth" class='form-control'>
                </div>
			</div>
			<br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Blood Group :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <select class="form-control" id="txtblood_group" name="txtblood_group" >
						<option value='' selected readonly>Select Blood Group</option>
						<option value='A+'>A+</option>
						<option value='A-'>A-</option>
						<option value='B+'>B+</option>
						<option value='B-'>B-</option>
						<option value='AB+'>AB+</option>
						<option value='AB-'>AB-</option>
						<option value='O+'>O+</option>
						<option value='O-'>O-</option>
						<option value='Bombay'>Bombay</option>
					</select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Place Of Birth <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <input type="text" class="form-control" id="txtbirth_place" name="txtbirth_place"  value="Solapur" />
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Nationality <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control" type="text" id="txtnationality_id" name="txtnationality_id" value="Indian"/>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Language (Mother Tongue ) <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <select class="form-control" id="txtlanguage" name="txtlanguage" >
						<option value='' readonly selected>Select Mother Tongue</option>
						<option value='Assamese'>Assamese</option>
						<option value='Bengali'>Bengali</option>
						<option value='Bodo'>Bodo</option>
						<option value='Dogri'>Dogri</option>
						<option value='Gujarati'>Gujarati</option>
						<option value='Hindi'>Hindi</option>
						<option value='Kannada'>Kannada</option>
						<option value='Kashmiri'>Kashmiri</option>
						<option value='Konkani'>Konkani</option>
						<option value='Maithili'>Maithili</option>
						<option value='Malayalam'>Malayalam</option>
						<option value='Manipuri'>Manipuri</option>
						<option value='Marathi'>Marathi</option>
						<option value='Nepali'>Nepali</option>
						<option value='Odia'>Odia</option>
						<option value='Punjabi'>Punjabi</option>
						<option value='Sanskrit'>Sanskrit</option>
						<option value='Santali'>Santali</option>
						<option value='Sindhi'>Sindhi</option>
						<option value='Tamil'>Tamil</option>
						<option value='Telugu'>Telugu</option>
						<option value='Urdu'>Urdu</option>					
					</select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Religion  <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <select class="form-control" id="txtreligion" name="txtreligion">
					</select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8"> Caste Category <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <select class="form-control" id="txtstudent_category_id" name="txtstudent_category_id">
					
					</select>
                </div>
            </div>
			<br>
			<div class="row">	
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">  Gender <span class="required">*</span> :</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                    <select class="form-control" id="txtgender" name="txtgender" >
						<option value='' selected readonly>Select Gender</option>
						<option value='Male' >Male</option>
						<option value='Female' >Female</option>
					</select>
                </div>
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">
					
				</div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
					<button class='btn btn-danger' id="btnSave">Save</input>
                </div>	
            </div>
</div>		
