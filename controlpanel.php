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
					echo $row[1]." | Control Panel";
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
		
		<div class="container">
			
			<center>
				
				<h3> <b> Control Panel </b> </h3>
				
				<br>
				
				<?php
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==1)
					{
						echo	"<div class='alert alert-success' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-thumbs-up'></span> &nbsp;
											Tax value added successfully.
										</center>
									</div>";
					}
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==2)
					{
						echo	"<div class='alert alert-success' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-thumbs-up'></span> &nbsp;
											Tax value is update successfully.
										</center>
									</div>";
					}
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==3)
					{
						echo	"<div class='alert alert-success' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-thumbs-up'></span> &nbsp;
											Gym Title added successfully.
										</center>
									</div>";
					}
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==4)
					{
						echo	"<div class='alert alert-success' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-thumbs-up'></span> &nbsp;
											Gym Tile is update successfully.
										</center>
									</div>";
					}
					
					
				?>
				
				<table width="70%">
					<tr>
						<td>
							
							<?php
								include("db.php");

								$sql = "select * from gym_title";
								
								$rs = mysql_query($sql);
								
								$row = mysql_fetch_array($rs);
								
								if(isset($row[0])=="")
								{	
									echo	"<a href='gymtitle' title='Click here to add New Gym Title'><button type='button' href='tax' class='btn btn-info'>Add Gym Title</button></a>";
								}
								
								else
								{
									echo	"<a href='gymtitle' title='Click here to Change Gym Title'><button type='button' class='btn btn-info'>Change Gym title</button></a>";
								}
							?>
							
						</td>
						
						<td align="right">
							<?php
								include("db.php");

								$sql = "select * from tax";
								
								$rs = mysql_query($sql);
								
								$row = mysql_fetch_array($rs);
								
								if(isset($row[0])=="")
								{	
									echo	"<a href='tax' title='Click here to add Tax Value'><button type='button' href='tax' class='btn btn-success'>Add Tax Value</button></a>";
								}
								
								else
								{
									echo	"<a href='tax' title='Click here to Change Tax Value'><button type='button' class='btn btn-success'>Change Tax Value</button></a>";
								}
							?>	
							
						</td>
					</tr>	
				</table>	
				<img src="img/rTLxoe9T8.jpg" class="img-responsive">
				<br><br>
				
				<table width="70%">	
					<tr>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info">Branch</button>
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="addbranch">Add New Branch</a></li>
									<li><a href="view_branch">View & Manage All Branch</a></li>
								</ul>
							</div>
						</td>
					
						<td align="right">
							<div class="btn-group">
								<button type="button" class="btn btn-success">Membership</button>
								<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="newmembership">Add New Membership</a></li>
									<li><a href="view_mem">View & Manage All Membership</a></li>
								</ul>
							</div>
						</td>
					</tr>	
				</table>
			
			</center>	
		
		</div>
		
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text" style="align:center"> Powered by @ <b>JIGNESH PANCHAL</b> </P>
		</div>
		
	</body>

</html>

<?php
	//$_SESSION["err"]="";
?>