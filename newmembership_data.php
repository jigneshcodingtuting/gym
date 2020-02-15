<?php session_start();

	include("db.php");

	$memtype = $_POST["memtype"];
	
	$sql = "insert into membership(mem_type) values('$memtype')";
	
	$rs = mysql_query($sql);
	
	if($rs)
	{
		header("location:newmembership");
		$_SESSION["err"]=1;
	}
	
	else
	{
		header("location:newmembership");
		$_SESSION["err"]=2;
	}
	
?>