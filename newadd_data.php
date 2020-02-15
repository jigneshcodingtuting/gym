<?php session_start();

	include("db.php");
	
	if(isset($_POST['submit']))
	{
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
		
		$sql = "insert into addmission (branch, join_date, name, gender, mem_type, 	mem_dur, fees, discount, total_fee, paid, due, paid_on, pay_rec, mem_exp, days_rem, mobile_land) values('$branch', '$joindate', '$name', '$gen', '$mem_type', '$dur', '$fees', '$dis', '$pay_tax', '$fpaid', '$due', '$paidnon', '$payrec', '$memex', '$dayrem', '$mbllnd')";

		$rs = mysql_query($sql);
		
		if($rs)
		{
			header("location:newadd");
			$_SESSION["err"]=1;
		}
		
		else
		{
			echo "<script> alert('Reccord not save') </script>";
		}
	}
	
	if(isset($_POST['printsubmit']))
	{
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
		
		$sql = "insert into addmission (branch, join_date, name, gender, mem_type, 	mem_dur, fees, discount, total_fee, paid, due, paid_on, pay_rec, mem_exp, days_rem, mobile_land) values('$branch', '$joindate', '$name', '$gen', '$mem_type', '$dur', '$fees', '$dis', '$pay_tax', '$fpaid', '$due', '$paidnon', '$payrec', '$memex', '$dayrem', '$mbllnd')";

		$rs = mysql_query($sql);
		
		if($rs)
		{
		?>
		
			<!DOCTYPE html>

			<html>

				<head>
				
					<title>
						<?php
							include("db.php");
							$sql = "select * from gym_title";
							$rs = mysql_query($sql);
							if($row = mysql_fetch_array($rs))
							{
								echo $row[1];
							}
						?> 
					</title>
					
					<meta charset="utf-8">
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1">
					
					<link rel="stylesheet" href="css/bootstrap.min.css">
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
					
					<script src="js/jquery.min.js"></script>
					<script src="js/bootstrap.min.js"></script>
					
					<link rel="stylesheet" href="css/style.css">
				
				</head>
				
				<body bgcolor="#ebebe0">
				
					<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        
						<div class="container-fluid">
					
							<div class="navbar-header">
								<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle" title="Menu">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div id="navbarCollapse" class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
									<li><a href="#" title="Home"> <span class="glyphicon glyphicon-home"></span> </a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Add Information like New Branch, Membership"> Add Information <b class="caret"></b></a>
										<ul role="menu" class="dropdown-menu">
											<li><a href="addbranch" title="Add New Branch"> Add Branch </a></li>
											<li> <a href="newmembership" title="Add New Membership"> New Membership </a> </li>
										</ul>
									</li>
									<li><a href="newadd" title="Addmission for New Member"> New Addmission </a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Records of All & Individual Branch"> Records <b class="caret"></b></a>
										<ul role="menu" class="dropdown-menu">
											<li> <a href="vewrecord" title="Click to see all Branch Records"> All Branch Records </a> </li>
											<li role="presentation" class="divider"></li>
												<?php
													include("db.php");
													$sql = "select * from branch";
													$rs = mysql_query($sql);
													while($row=mysql_fetch_array($rs))
													{
														echo  "<li> <a href='vewrecord?cat=$row[1]' title='Click to see $row[1] Branch Record'>".$row[1]." Branch</a> </li>";
													}
												?>
										</ul>
									</li>
								</ul>
								
								<form class="navbar-form navbar-left" action="search_data" method="post" role="search" title="Find Record of any member by ID & Name">
									<div class="form-group input-group">
										<input type="text" class="form-control" name="search" placeholder="Find Record...">
										<span class="input-group-btn">
											<input class="btn btn-default" type="submit" name="submit" value="Go">
										</span>
									</div>
								</form>
						
								<ul class="nav navbar-nav navbar-right">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Admin">
											<span class="glyphicon glyphicon-user"></span> Admin <b class="caret"></b>
										</a>
										<ul role="menu" class="dropdown-menu">
											<li> <a href="changeps" title="Change  Password"> <span class="glyphicon glyphicon-lock"></span> Change Password </a> </li>
											<li role="presentation" class="divider"></li>
											<li> <a href="logout" title="Logout"> <span class="glyphicon glyphicon-log-out"></span> Logout </a> </li>
										</ul>
									</li>
								</ul>
							</div>
						</div>	
					</nav><br><br><br>
					
					<center>
						
						<div class="container-fluid">
							<div class="navbar"><font size='+1' color='green'><b>Record save successfully</b></font></div>
							<h3 style="margin-top:-25px"> <b> Woly Fitness Center </b> </h3>
							<form action="newadd_data" method="post" name="newadd">
								
								<table class="table table-bordered" align="center">
								
									<tr align="center">
										<td colspan="4"> <h4> <b> New Addmission </b> </h4> </td>
									</tr>
									
									<tr>
										<td align="center">
											<b> Branch: </b> 
											<br>
											<?php echo $branch; ?>
										</td>
										<td align="center"> <b> Joining Date: </b> <br> <?php echo $joindate ; ?> </td>
										<td align="center">
											<b> Candidate Name: </b> <br> <?php echo $name ; ?>
										</td>	
										
										<td align="center">
											<b> Gender </b> <br> <?php echo $gen; ?>
										</td>
									</tr>
									
									<tr align="center">
										<td colspan="4"> <h4> <b> Membership Type, Duration & Fees </b> </h4> </td>
									</tr>
									
									<tr>
										<td align="center">
											<b>Membership Type</b>
											<br>
											<?php echo $mem_type; ?>
										</td>
											
										<td align="center">
											<b>Duration</b>
											<br>
											<?php echo $dur; ?>
										</td>
											
										<td align="center">
											<b>Fees</b>
											<br>
											<?php echo $fees; ?>
										</td>
											
										<td align="center">
											<b>Discount</b><br><?php echo $dis; ?>
										</td>
										
									</tr>
									
									<tr align="center">
										<td colspan="4"> <h4> <b> Amount Details </b> </h4> </td>
									</tr>
									
									<tr>
										
										<td align="center"> <b> Payeble Amount + 15% Tax: </b> <br> <?php echo $pay_tax; ?> </td>
										<td align="center"> <b> Fees Paid: </b> <br> <?php echo $fpaid; ?> </td>
										
										<td align="center"> <b> Due: </b> <br> <?php echo $due; ?> </td>
										
										<td align="center"> <b> Paid On: </b> <br> <?php echo $paidnon; ?> </td>
									</tr>
									
									<tr>
										
										<td align="center"> <b> Payment Receipt: </b> <br> <?php echo $payrec; ?> </td>
										 <td align="center"> <b> Membership Expire: </b> <br> <?php echo $memex; ?>  </td>
										 <td align="center"> <b> Days Remaining: </b> <br> <?php echo $dayrem; ?> </td>
										<td align="center"> <b> Mobile / Landline: </b> <br> <?php echo $mbllnd; ?> </td>
									</tr>
									
								</table>
								<div class="navbar">
									<button class="btn btn-default" value="print" onclick="print()">Print Form</button>
								</div>
							</form>
							
						</div>
					
					</center>
					
					<div class="navbar navbar-inverse navbar-fixed-bottom">
						<p class="navbar-text" style="align:center"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
					</div>
					
					<div style="margin-top:-20px"></div>
				
				</body>

			</html>

	<?php
		}
	
		else
		{
			echo "<script> alert('Reccord not save') </script>";
		}
	}

?>