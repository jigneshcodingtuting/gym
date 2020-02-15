<?php session_start(); ?>

<!DOCTYPE html>

<html>

	<head>
		
		<title>Wolly | Add New Branch</title>
		
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
				
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==1)
					{
						echo	"<div class='alert alert-success' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-thumbs-up'></span> &nbsp;
											Branch added successfully.
										</center>
									</div>";
					}
					
					if(isset ($_SESSION["err"]) && $_SESSION["err"]==2)
					{
						echo	"<div class='alert alert-danger' style='width:550px'>
										<a href='#' class=close data-dismiss=alert aria-label=close>&times;</a>
										<center>
											<span class='glyphicon glyphicon-warning-sign'></span> &nbsp;
											Oops!!! Sorry branch not added. Please try again.
										</center>
									</div>";
					}
				
				?>
			
				<form action="addbranch_data" method="post" name="branch" onsubmit="return message();">
					
					<script>
						
						function message()
						{
							var a = document.branch.branchname.value;
							var b = document.branch.address.value;
							var c = document.branch.contact_num.value;
							
							if(a=="" || b=="" || c=="")
							{
								alert("Please fill all  fields");
								return false;
							}
						}
						
					</script>
					
					<table class="table table-bordered" style="width:550px">
						<tr>
							<td colspan="2" align="center">
								<h1><font> <b>Add New Branch</b> </font> </h1>
							</td>
						</tr>
						<tr>
							<td align="right"><b>Branch Name:</b></td>
							<td><input type="text" class="form-control" name="branchname" placeholder="Enter New Branch Name" size="27"></td>
						</tr>
						
						<tr>
							<td align="right"><b>Address:</b></td>
							<td><textarea name="address" class="form-control" cols="21px" placeholder="Address of Branch"></textarea></td>
						</tr>
						
						<tr>
							<td align="right"><b>Contact Num:</b></td>
							<td><input type="text" class="form-control" name="contact_num" placeholder="Enter Contact Number" size="27"></td>
						</tr>
						
						<tr>
							<td colspan="2" align="center">
								<div class="row" style="margin-left:15%">
									<div class="col-xs-5">
										<input type="submit" class="btn btn-success" value="Submit">
									</div>
									<div class="col-xs-5">
										<input type="reset" class="btn btn-danger" value="Cancel">
									</div>
								</div>
								
								
							</td>
						</tr>
					</table>
				</form>
				<br>
				<a href="view_branch">
					<button class="btn btn-info" style="width:550px">View & Manage Branch</button>
				</a>
				
			</div>	
		
		</center>
		
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<p class="navbar-text pull-left" style="align:center"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
		</div>
	
	</body>

</html>

<?php
	$_SESSION["err"]="";
?>