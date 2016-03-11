<?php
	function write_query($txt)
	{
	}
	function ns_mysql_query($txt)
	{
		if($result=mysql_query($txt))
		{
			$CurrentDate=date('Y-m-d');
			$file="File$CurrentDate";
			$myfile = file_put_contents("FolderFile/sample.txt", $txt.PHP_EOL , FILE_APPEND);		
			return $result;
		}
		else
		{
			return false;
		}
	}
?>