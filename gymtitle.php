<?php session_start(); ?>

<!DOCTYPE html>

<html>

	<head>
		
		<title>Gym Title</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</head>
	
	<body bgcolor="#ebebe0" onload="ld()">
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
		</nav><br><br><br><br><br>
		
		<center>
		
			<div class="container-fluid">
				
				<?php
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==2)
					{
						echo	"<div class='alert alert-danger' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-warning-sign'></span> &nbsp;
											Oops!!! Gym Title not added. Please try again.
										</center>
									</div>";
					}
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==5)
					{
						echo	"<div class='alert alert-danger' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-warning-sign'></span> &nbsp;
											Oops!!! Update failed, please try again.
										</center>
									</div>";
					}
				
				?>
			
				<form action="gym_data" method="post" name="gymform" onsubmit="return message();">
				
					<script>
						
						function message()
						{
							var a = document.gymform.gym.value;
							
							if(a=="")
							{
								alert("Please enter Gym Title.");
								return false;
							}
						}
						
					</script>
					
					<?php
						include("db.php");

						$sql = "select * from gym_title";
						
						$rs = mysql_query($sql);
						
						$row = mysql_fetch_array($rs);
						
						if(isset($row[0])=="")
						{	
							echo	"<table class='table table-hover table-bordered' style='width:550px'>
										<tr>
											<td colspan='2' align='center'>
												<h2> <b> Gym Title </b> </h2>
											</td>
										</tr>
										<tr>
											<td align='right'><b>Enter new Gym Title:</b></td>
											<td>
												<script>
													function ld()
													{
														document.gymform.gym.focus();
													}
												</script>
												
												<input type='text' class='form-control' name='gym' maxlength='50' placeholder='Enter your Gym Title here' aria-describedby='basic-addon2'>
											</td>
										</tr>
										
										<tr>
											<td colspan='2' align='center'>
												<div class='row' style='margin-left:15%'>
													<div class='col-xs-5'>
														<input type='submit' class='btn btn-success' name='newgym' value='Submit'>
													</div>
													<div class='col-xs-5'>
														<input type='reset' class='btn btn-danger' value='Cancel'>
													</div>
												</div>
											</td>
										</tr>
					
									</table>";
						}
						
						else
						{
							echo 	"<table class='table table-hover table-bordered' style='width:550px'>
										<tr>
											<td colspan='2' align='center'>
												<h2> <b> Change Gym Title </b> </h2>
											</td>
										</tr>
										<tr>
											<td align='right'><b>Enter new Gym Title:</b></td>
											<td>
												<script>
													function ld()
													{
														document.gymform.gym2.focus();
													}
												</script>
												
												<input type='text' class='form-control' name='gym2' maxlength='50' value='$row[1]' aria-describedby='basic-addon2'>
											</td>
										</tr>
										
										<tr>
											<td colspan='2' align='center'>
												<div class='row' style='margin-left:15%'>
													<div class='col-xs-5'>
														<input type='submit' class='btn btn-primary' name='changegym' value='Update'>
													</div>
													<div class='col-xs-5'>
														<input type='reset' class='btn btn-danger' value='Cancel'>
													</div>
												</div>
												
												
											</td>
										</tr>
					
									</table>";
						}
					?>				
				</form>	
				
			</div>	
		
		</center>
		
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text" style="align:center"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
		</div>
		
	</body>

</html>	
<?php
	$_SESSION["err"]="";
?>