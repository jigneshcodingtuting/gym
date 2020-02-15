<?php session_start();

	include("db.php");

	$branchname = $_POST["branchname"];
	$address = $_POST["address"];
	$contact_num = $_POST["contact_num"];
	
	$sql = "insert into branch(branch_name, address, contact_num) values('$branchname', '$address', '$contact_num')";
	
	$rs = mysql_query($sql);
	
	if($rs)
	{
		header("location:addbranch");
		$_SESSION["err"]=1;
	}
	
	else
	{
		header("location:addbranch");
		$_SESSION["err"]=2;
	}
	
?>