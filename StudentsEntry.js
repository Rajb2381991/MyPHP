$(document).ready(function()
{	
		$("#btnSave").click(function()
		{
			alert('clicked now');
		});
    	$("#txtMasterCourseId").change(function(){
			$.get("CommonOperations.php?Flag=getListByCondition&Table=tblcourse&ValueField=CourseId&DisplayField=CourseName&ConditionField=MasterCourseId&ConditionValue="+$("#txtMasterCourseId").val(),function(data,sucess)
			{
				$("#txtCourseId").html(data);
			});
		});
		$.get("CommonOperations.php?Flag=getList&Table=tblcastecategory&ValueField=CasteId&DisplayField=Caste",function(data,sucess)
		{
			$("#txtstudent_category_id").html("");
			$('#txtstudent_category_id').append("<option value='0'>Select Caste Category</option>");					
			$("#txtstudent_category_id").append(data);
		});	

		$.get("CommonOperations.php?Flag=getList&Table=tblreligion&ValueField=CasteId&DisplayField=Caste",function(data,sucess)
		{
			$("#txtreligion").html("");
			$('#txtreligion').append("<option value='0'>Select Religion</option>");					
			$("#txtreligion").append(data);
		});				

		$("#txtCourseId").change(function(){
			$.get("CommonOperations.php?Flag=getListByCondition&Table=batches&ValueField=id&DisplayField=name&ConditionField=CourseId&ConditionValue="+$("#txtCourseId").val(),function(data,sucess)
			{
				$("#txtbatch_id").html(data);
			});
		});
		$("#txtbatch_id").change(function()
		{
			$.post("FetchMetaData.php",
			{
				Flag:"GenerateAdmissionNo",
				BatchId:$(this).val()
			},function(data,success){
				$("#txtadmission_no").val(data);
			});
		});

});