    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{
		$.post("CoMatrixOperations.php",
		{
			Flag:"ShowCoMatrix"
		},function(data,success)
		{
			//alert(data);
			$("#DivCoMatrix").html(data);
			$("td:empty").css('background-color', '#DFF0D0');
		});
	});
</script>
<div class="container"><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<div id="DivCoMatrix"></div>
		</div>
	</div>
</div>