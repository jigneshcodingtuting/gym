<?php session_start();

	$branch = $_POST["branch"];
	$joindate = $_POST["joindate"];
	$name = $_POST["name"];
	$gen = $_POST["gen"];
	$mem_type = $_POST["mem_type"];
	$dur = $_POST["dur"];
	$fees = $_POST["fees"];
	$dis = $_POST["dis"];
	$pay_tax = $_POST["pay_tax"];
	$fpaid = $_POST["fpaid"];
	$due = $_POST["due"];
	$paidnon = $_POST["paidnon"];
	$payrec = $_POST["payrec"];
	$memex = $_POST["memex"];
	$dayrem = $_POST["dayrem"];
	$mbllnd = $_POST["mbllnd"];

	include("db.php");
	
	$sql = "update addmission set branch='$branch'  "
	


?>