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
					echo $row[1]." | Branch";
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
						<li class="active"><a href="controlpanel" title="Control Panel"> Control Panel </a></li>
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
		
		<div class="container-fluid">
		
			<center><h4> <b> View & Manage Branch  </b> </h4></center>	
			
			<a href="addbranch">
				<button class="btn btn-info btn-xs"> Add New Branch </button>
			</a>
			<br><br>
			<center>	
				
				<table class="table table-bordered table-hover table-condensed">
				
					<thead>
						<tr class="active" align="center">
							<td> <b> # </b> </td>
							<td> <b> Branch Name </b> </td>
							<td> <b> Address </b> </td>
							<td> <b> Contact Num. </b> </td>
							<td> <b> Option </b> </td>
						</tr>
					</thead>
					
					<?php
					
						include("db.php");
						
						$sql = "select * from branch";
						$rs = mysql_query($sql);
						
						while($row = mysql_fetch_array($rs))
						{
							echo 	"<tr align='center'>
										<td> $row[0] </td>
										<td> $row[1] </td>
										<td> $row[2] </td>
										<td> $row[3] </td>
										<td> 
											<div class='btn-group'>
												<button type='button' class='btn btn-default btn-xs'>Click</button>
												<button type='button' class='btn btn-default btn-xs' dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
													<span class='caret'></span>
													<span class='sr-only'>Toggle Dropdown</span>
												</button>
												<ul class='dropdown-menu dropdown-menu-right'>
													<li><a href='newmembership'>Edit</a></li>
													<li role='presentation' class='divider'></li>
													<li><a href='del_branch?id=$row[0]'><font color='maroon'>Delete Branch</font></a></li>
												</ul>
											</div>
										</td>	
									</tr>";
						}
						
					?>
				
				</table>
				
				<br><br>
				
			</center>
			
		</div>	
		
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text" style="align:center"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
		</div>
		
	</body>

</html>