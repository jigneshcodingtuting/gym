<?php session_start();

	include("db.php");
	
	if(isset($_POST["newtax"]))
	{
		$tax = $_POST["tax"];
		
		$sql = "insert into tax(tax_value) values('$tax')";
		
		$rs = mysql_query($sql);
		
		if($rs)
		{
			header("location:controlpanel");
			$_SESSION["err"]=1;
		}
		
		else
		{
			header("location:tax");
			$_SESSION["err"]=2;
		}
	}
	
	if(isset($_POST["changetax"]))
	{
		$tax2 = $_POST["tax2"];
	
		$sql = "update tax set tax_value = '$tax2'";
		
		$rs = mysql_query($sql);
		
		if($rs)
		{
			header("location:controlpanel");
			$_SESSION["err"]=2;
		}
		
		else
		{
			header("location:tax");
			$_SESSION["err"]=3;
		}
	}
	
	
?>