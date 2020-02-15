<?php session_start();

	$a = $_GET["id"];
	
	include("db.php");
	
	$sql = "delete from branch where id = '$a'";
	
	$rs = mysql_query($sql);
	
	if($rs)
	{
		header("location:view_branch");
	}

?>