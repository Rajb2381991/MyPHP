<?php 
	error_reporting(0);
	include_once("VerifyLicense.php"); 
?>
<html lang="en">
<head>
	<div class="se-pre-con"></div>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/alertify.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.js"></script>
	<script src="alertify.js"></script>
	<script>
	function InitializeTable(TableName)
	{
	            var oTable = $('#'+TableName).dataTable({
                    "oLanguage": 
					{
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': true,
                            'aTargets': [0],
							'destroy':true
                        } //disables sorting for column one
					],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip'
                });		
	}
</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>