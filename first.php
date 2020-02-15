<!DOCTYPE html>

<?php session_start(); ?>

<html>

	<head>
		
		<title>
			<?php
				include("db.php");
				$sql = "select * from gym_title";
				$rs = mysql_query($sql);
				if($row = mysql_fetch_array($rs))
				{
					echo $row[1]." | Home";
				}
			?> 
		</title>
	
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	
	</head>
	
	<body>
		
		<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        
			<div class="container-fluid">
		
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle" title="Menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="first"> Smart Gym </a>
				</div>
				
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="controlpanel" title="Control Panel"> Control Panel </a></li>
						<li><a href="newadd" title="Addmission for New Member"> New Addmission </a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Records of All & Individual Branch"> Records <b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
								<li> <a href="vewrecord" title="Click to see all Branch Records"> All Branch Records </a> </li>
								<li role="presentation" class="divider"></li>
									<?php
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
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Upcoming Expire Addmission">
								<span class="glyphicon glyphicon-warning-sign"></span>
							</a>
						</li>
						
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Birthday">
								<span class="glyphicon glyphicon-gift"></span>
							</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Information">
								<span class="glyphicon glyphicon-info-sign"></span>
							</a>
							<ul role="menu" class="dropdown-menu">
								<li> 
									<?php
										$sql1 = "select * from addmission where due > 0";
										$rs1 = mysql_query($sql1);
										$due_add = mysql_num_rows($rs1);
										
										$sql2 = "select sum(due) from addmission";
										$rs2 = mysql_query($sql2);

										while($row2 = mysql_fetch_array($rs2))
										{
											echo "<a href='#duefees' title='Due Fees Members'>Due Fees Members <span class='badge'>". $due_add . "</span> = Rs." .$row2['sum(due)']."</a>";
										}	
									?>
								</li>
								
								<li>
									<?php
										$sql3 = "select * from addmission";
										$rs3 = mysql_query($sql3);
										
										while($row3 = mysql_fetch_array($rs3))
										{
											date_default_timezone_set('Asia/Kolkata');
											$from = strtotime($row[15]);
											$today = strtotime(date('d-m-Y'));
											$difference = ceil(abs($from - $today) / 86400);
											
											echo $row[0];
											
										}
										
										
									?>
								</li>
								
								<li>
									<?php
										$sql4 = "select * from addmission where days_rem > 31 && days_rem < 61 ";
										$rs4 = mysql_query($sql4);
										$next_expire = mysql_num_rows($rs4);
										
										$sql5 = "select sum(days_rem) from addmission";
										$rs5 = mysql_query($sql5);
										
										if($next_expire > 0)
										{
											while($row4 = mysql_fetch_array($rs5))
											{
												echo "<a href='#' title='Next Month Expire Addmission'> Next Month Expire Addmission <span class='badge'>". $next_expire . "";
											}
										}
										
										else
										{
											echo "<a href='#' title='Next Month Expire Addmission'> Next Month Expire Addmission </a>";
										}
									?>
								</li>
								
								<li>
									<?php
										$sql5 = "select * from addmission where days_rem > -31 && days_rem < 0 ";
										$rs5 = mysql_query($sql5);
										$pre_expire = mysql_num_rows($rs5);
										
										$sql6 = "select sum(days_rem) from addmission";
										$rs6 = mysql_query($sql6);
										
										if($pre_expire > 0)
										{
											while($row5 = mysql_fetch_array($rs6))
											{
												echo "<a href='#' title='Previous Month Expired Addmission'> Previous Month Expired Addmission <span class='badge'>". $pre_expire . "";
											}
										}
										
										else
										{
											echo "<a href='#' title='Previous Month Expire Addmission'> Previous Month Expire Addmission </a>";
										}
									?>
								</li>
								
								<li role="presentation" class="divider"></li>
								
								<li>
									<a href="#" title="View Records from Date To Date"> View Records from Date To Date </a> 
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Admin">
								<span class="glyphicon glyphicon-user"></span><b class="caret"></b>
							</a>
							<ul role="menu" class="dropdown-menu">
								<li> <a href="changeps" title="Upcoming Birthday"> <span class="glyphicon glyphicon-lock"></span> Upcoming Birthday </a> </li>
								<li role="presentation" class="divider"></li>
								<li> <a href="logout" title="Logout"> <span class="glyphicon glyphicon-log-out"></span> Logout </a> </li>
							</ul>
						</li>
					</ul>
				</div>
			</div>	
		</nav><br><br><br>
		<div class="container-fluid">
			<center>
				
				<br><br><br>
				
				<img src="img/6Tp6xXzjc.jpg" class="img-responsive">
				<br>
				<img src="img/smartgym.png" class="img-responsive">
				<small> Powered by @ <b>Jignesh Panchal</b> </small>
				
			</center>
		</div>	
		
		<!--<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text" style="align:center"> Powered by @ <b>JP Tech</b> </P>
		</div>-->
		
	</body>

</html>	

<?php
	$_SESSION["err"]="";
?>