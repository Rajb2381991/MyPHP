<?php
	include_once("db.php");
	function Fetch($TableName,$IdField,$TextField,$IdValue)
	{
		$query=mysql_query("select $TextField from $TableName where $IdField=$IdValue");
		if(mysql_num_rows($query)!=0)
		{
			$rwFetch=mysql_fetch_array($query);
			$TextValue=$rwFetch[$TextField];				
			echo $TextValue;
		}
		else
		{
			echo mysql_error();
		}
	}
	function Fetch1($TableName,$IdField,$TextField,$IdValue)
	{
		$query=mysql_query("select $TextField from $TableName where $IdField=$IdValue");
		if(mysql_num_rows($query)!=0)
		{
			$rwFetch=mysql_fetch_array($query);
			$TextValue=$rwFetch[$TextField];				
			return $TextValue;
		}
		else
		{
			return mysql_error();
		}
	}
	function FullName($TableName,$IdField,$TextField1,$TextField2,$TextField3,$IdValue)
	{
		$query=mysql_query("select $TextField1,$TextField2,$TextField3 from $TableName 
		where $IdField=$IdValue");
		if(mysql_num_rows($query)!=0)
		{
			$rwFetch=mysql_fetch_array($query);
			$TextValue1=$rwFetch[$TextField1];				
			$TextValue2=$rwFetch[$TextField2];				
			$TextValue3=$rwFetch[$TextField3];
			$Full=$TextValue1." ".$TextValue2." ".$TextValue3;			
			echo $Full;
		}
		
	}
	function FetchCombine($TableName,$IdField,$TextField,$IdValue)
	{
		$query=mysql_query("select $TextField from $TableName where $IdField=$IdValue");
		if(mysql_num_rows($query)!=0)
		{
			$rwFetch=mysql_fetch_array($query);
			$TextValue=$rwFetch[$TextField];				
			echo $TextValue;
		}
	}
?>