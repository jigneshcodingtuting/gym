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
					echo $row[1]." | Records";
				}
			?> 
		</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
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
					
					<form class="navbar-form navbar-left" action="search_data" method="post" role="search" title="Find Record of any member by ID, Name or Keyword">
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
		</nav><br><br><br><br><br>
		
		<div class="container-fluid">
		
			<?php
				
				$search = $_POST["search"];
				
				include("db.php");
				
				$sql = "select * from addmission where id like '%$search%' || name like '%$search%'";
				
				$rs = mysql_query($sql);
				
				if(mysql_num_rows($rs)<1)
				{
					echo	"<center style='margin:2%'>
								<h3>
									<b>
										<font color='#e67e00'>
											<span class='glyphicon glyphicon-warning-sign'></span> &nbsp;
											Oops!!! Sorry there is no result fount to related the word - 
										</font>$search
									</b>
								</h3>
							</center>";
					exit();
				}
				
				else
				{
					echo 	"<center style='margin-top:-45px'>
								<h4> <b> Search Result for - <font color='#1a8cff'> $search </font></b></h4>
							</center>";
				?>			
		
					<form action="oprat" method="post">	
						
						<div style="margin-top:12px">
							<input class="btn btn-primary btn-xs" type="submit" id = "edit" name="edit" value="&nbsp; &nbsp;Edit&nbsp;&nbsp;&nbsp;">&nbsp;&nbsp;&nbsp;
							<input class="btn btn-danger btn-xs" type="submit" id = "delete" name="delete" value="Delete">&nbsp;&nbsp;&nbsp;
							<input class="btn btn-info btn-xs" type="submit" id = "details" name="details" value="Details">
						</div>
			
						<table class='table table-hover table-bordered' style='margin-top:8px'>
		
							<tr align='center' class='active'>
								<td><input type='checkbox' name='checkbox1'></td>
								<td><b>ID</b></td>
								<td><b>Branch</b></td>
								<td><b>Joining Date</b></td>
								<td><b>Name</b></td>
								<td><b>Membership Type</b></td>
								<td><b>Duration</b></td>
								<td><b>Fee</b></td>
								<td><b>Dis.</b></td>
								<td><b>Total Fee</b></td>
								<td><b>Paid Fee</b></td>
								<td><b>Due Fee</b></td>
								<td><b>Paid On</b></td>
								<td><b>Fee Receipt</b></td>
								<td><b>Membership Expire</b></td>
								<td><b>Days Rem.</b></td>
								<td><b>Contact N.</b></td>
							</tr>
					<?php			
						
							while($row = mysql_fetch_array($rs))
							{
								echo 	"<tr align='center'>
											<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value='$row[0]'></td>
											<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[5]</td>
											<td>$row[6]</td>
											<td>$row[7]</td>
											<td>$row[8]</td>
											<td class='info'>$row[10]</td>
											<td class='success'>$row[11]</td>
											<td class='danger'>$row[12]</td>
											<td>$row[13]</td>
											<td>$row[14]</td>
											<td class='danger'>$row[15]</td>
											<td class='warning'>$row[16]</td>
											<td>$row[17]</td>
										</tr>";
							}
						
						echo	"</table>";
					}
				
			?>
				</form>
		</div>	
	
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text pull-left"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
		</div>
	
	</body>
	
</html>
