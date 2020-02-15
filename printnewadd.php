<!DOCTYPE html>

<?php session_start(); ?>

<html>

	<head>
	
		<title> Wolly Gym </title>
	
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
		<link rel="stylesheet" href="css/style.css">
		
		<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
		
		<script type="text/javascript">
			function show()
			{
				new JsDatePick({
					useMode:2,
					target:"inputField",
					dateFormat:"%d-%M-%Y"
				});
			}	
			
			function show1()
			{
				new JsDatePick({
					useMode:2,
					target:"inputField1",
					dateFormat:"%d-%M-%Y"
				});
			}
			
			function show2()
			{
				new JsDatePick({
					useMode:2,
					target:"inputField2",
					dateFormat:"%d-%M-%Y"
				});
			}
		</script>
		
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
		</nav><br><br>
		
		<center>
			
			<div class="container-fluid">
				<h3> <b> Woly Fitness Center </b> </h3>
				<form action="newadd_data" method="post" name="newadd">
					
					<?php
					
						if(isset ($_SESSION["err"]) && $_SESSION["err"]==1)
						{
							echo "<center><font size='+1' color='green'><b>Record save successfully</b></font></center>";
						}
					
					?>
				
					<table class="table table-bordered" align="center">
					
						<tr align="center">
							<td colspan="4"> <h4> <b> New Addmission </b> </h4> </td>
						</tr>
						
						<tr>
							<td align="center">
								<b> Branch: </b> 
								<br>
								<select name="branch" class="form-control">
									<option value=''> -- Choose Branch -- </option>
									<?php
										include("db.php");
										$sql = "select * from branch";
										$rs = mysql_query($sql);
										while($row=mysql_fetch_array($rs))
										{
											echo "<option value='$row[1]'>" .$row[1]. "</option>";
										}
									?>
								</select>
							</td>
							<td align="center"> <b> Joining Date: </b> <br> <input type="text" name="joindate" class="form-control" id="inputField" onfocus="show()"/> </td>
							<td align="center">
								<b> Candidate Name: </b> <br> <input type="text"  class="form-control" name="name">
							</td>	
							
							<td align="center">
								<b> Gender </b> <br>
									<select name="gen" class="form-control">
										<option value=""> -- Select -- </option>
										<option value="Male"> Male </option>
										<option value="Female"> Female </option>
										<option value="Other"> Other </option>
									</select>
							</td>
						</tr>
						
						<tr align="center">
							<td colspan="4"> <h4> <b> Membership Type, Duration & Fees </b> </h4> </td>
						</tr>
						
						<tr>
							<td align="center">
								<b>Membership Type</b>
								<br>
								<select name="mem_type" class="form-control">
									<option value=""> &nbsp;&nbsp;&nbsp;&nbsp; -- Choose Type -- </option>
									<?php
										include("db.php");
										
										$sql = "select * from membership";
										$rs = mysql_query($sql);
										
										while($row=mysql_fetch_array($rs))
										{
											echo "<option value='$row[1]'> $row[1] </option>";
										}
									?>
								</select>	
							</td>
								
							<td align="center">
								<b>Duration</b>
								<br>
								<select name="dur" class="form-control">
									<option value=""> -- Choose Duration -- </option>
									<option value="1 Month"> 1 Month </option>
									<option value="2 Months"> 2 Months </option>
									<option value="3 Months"> 3 Months </option>
									<option value="4 Months"> 4 Months </option>
									<option value="5 Months"> 5 Months </option>
									<option value="6 Months"> 6 Months </option>
									<option value="7 Months"> 7 Months </option>
									<option value="8 Months"> 8 Months </option>
									<option value="9 Months"> 9 Months </option>
									<option value="10 Months"> 10 Months </option>
									<option value="11 Months"> 11 Months </option>
									<option value="12 Months"> 12 Months </option>
									<option value="5 Years"> 5 Years </option>
								</select>
							</td>
								
							<td align="center">
								<b>Fees</b>
								<br>
								<select name="fees" class="form-control">
									<option value=""> &nbsp;&nbsp; -- Choose Fees -- </option>
									<option value="800"> &#x20A8; 800 </option>
									<option value="1000"> &#x20A8; 1000 </option>
									<option value="1600"> &#x20A8; 1600 </option>
									<option value="2000"> &#x20A8; 2000 </option>
									<option value="2500"> &#x20A8; 2500 </option>
									<option value="3000"> &#x20A8; 3000 </option>
									<option value="3500">&#x20A8; 3500 </option>
									<option value="4000">&#x20A8; 4000 </option>
									<option value="4500">&#x20A8; 4500 </option>
									<option value="5000">&#x20A8; 5000 </option>
									<option value="6000">&#x20A8; 6000 </option>
									<option value="8000">&#x20A8; 8000 </option>
									<option value="10000">&#x20A8; 10000 </option>
									<option value="14000">&#x20A8; 14000 </option>
									<option value="15000">&#x20A8; 15000 </option>
									<option value="18000">&#x20A8; 18000 </option>
									<option value="25000">&#x20A8; 25000 </option>
								</select>	
							</td>
								
							<td align="center">
								<b>Discount</b><br><input type="text" onblur="feespaid()" name="dis" value="" class="form-control" size="23">
							</td>
							
						</tr>
						
						<tr align="center">
							<td colspan="4"> <h4> <b> Amount Details </b> </h4> </td>
						</tr>
						
						<tr>
							
							<script>
								function feespaid()
								{
									var a = parseInt(document.newadd.fees.value);
									var b = parseInt(document.newadd.dis.value);
									
									var c = a-b;
									
									d = c * 15/100;
									e = c+d;
									document.newadd.pay_tax.value = e;
								}
							</script>
							
							<td align="center"> <b> Payeble Amount + 15% Tax: </b> <br> <input type="text" class="form-control" readonly name="pay_tax" value="" size="27"> </td>
							<td align="center"> <b> Fees Paid: </b> <br> <input type="text" class="form-control" name="fpaid" value="" onblur="dueamount()" size="27"> </td>
							
							<script>
								function dueamount()
								{
									var a = parseInt(document.newadd.pay_tax.value);
									var b = parseInt(document.newadd.fpaid.value);
									
									c = a-b;
									
									document.newadd.due.value = c;
								}
							</script>
							
							<td align="center"> <b> Due: </b> <br> <input type="text" class="form-control" name="due" value="" readonly size="27"> </td>
							
							<td align="center"> <b> Paid On: </b> <br> <input type="text" class="form-control" name="paidnon" value="" size="27" onfocus="show1()"id="inputField1"> </td>
						</tr>
						
						<tr>
							
							<td align="center"> <b> Payment Receipt: </b> <br> <input type="text" class="form-control" name="payrec" value="" size="27"> </td>
							 <td align="center"> <b> Membership Expire: </b> <br> <input type="text" class="form-control" name="memex" value="" size="27" onfocus="show2()"id="inputField2"> </td>
							 <td align="center"> <b> Days Remaining: </b> <br> <input type="text" class="form-control" name="dayrem" value="" size="27"> </td>
							<td align="center"> <b> Mobile / Landline: </b> <br> <input type="text" class="form-control" name="mbllnd" value=""  size="27"> </td>
						</tr>
						
					</table>
					<div  style="margin-top:15px">
						<input type="submit" class="btn btn-default" name="printsubmit" value="Print Priview">
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
	$_SESSION["err"]="";
?>