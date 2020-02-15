<?php session_start();

	include("db.php");
	
	if(isset($_POST["newgym"]))
	{
		$gym = $_POST["gym"];
		
		$sql = "insert into gym_title(title) values('$gym')";
		
		$rs = mysql_query($sql);
		
		if($rs)
		{
			header("location:controlpanel");
			$_SESSION["err"]=3;
		}
		
		else
		{
			header("location:gymtitle");
			$_SESSION["err"]=2;
		}
	}
	
	if(isset($_POST["changegym"]))
	{
		$gym2 = $_POST["gym2"];
	
		$sql = "update gym_title set title = '$gym2'";
		
		$rs = mysql_query($sql);
		
		if($rs)
		{
			header("location:controlpanel");
			$_SESSION["err"]=4;
		}
		
		else
		{
			header("location:gymtitle");
			$_SESSION["err"]=5;
		}
	}
	
	
?>