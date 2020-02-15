<?php session_start(); ?>

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
		
		<?php
			
			include("db.php");
			
			if(isset($_POST['delete']))
			{
				$id = $_POST["checkbox"];
			
				$i=count($id);
				
				for($j=0;$j<$i;$j++)
				{
					$sql = "delete from addmission where id = '$id[$j]'";
					
					$rs = mysql_query($sql);
					
				}
				header("location:vewrecord");
			}
			
			if(isset($_POST['edit']))
			{
				$id = $_POST["checkbox"];
				$i=count($id);
				
				for($j=0;$j<$i;$j++)
				{
					$sql2 = "select * from addmission where id = '$id[$j]'";
					
					$rs2 = mysql_query($sql2);
					
					if($row = mysql_fetch_array($rs2))
					{
						echo 	"<center>
						
									<div class='container'>
										<h3> <b> Edit Record </b> </h3>
										<form action='oprat' method='post' name='editrecord'>
											<div class='row'>
												<div class='col-sm-12'>
														
														<table class='table table-bordered' align='center'>
															
															<input type = 'hidden' name='id' value='$row[0]'>
															
															<tr>
																<td align='center'>
																	<b> Branch: </b> 
																	<br>
																	<select name='branch[]' class='form-control'>
																		<option value='$row[1]'> $row[1] </option>';";
																		
																		$sql3 = "select * from branch";
																		$rs3 = mysql_query($sql3);
																		while($row3=mysql_fetch_array($rs3))
																		{
																			echo "<option value='$row3[1]'>" .$row3[1]. "</option>";
																		}
																	
																	echo "	
																	</select>
																</td>
																
																<td align='center'> <b> Joining Date: </b> <br> <input type='text' name='joindate[]' class='form-control' id='inputField' onfocus='show()' value='$row[2]'/> </td>
																
																<td align='center'>
																	<b> Candidate Name: </b> <br> <input type='text'  class='form-control' name='name[]' value='$row[3]'>
																</td>	
																
																<td align='center'>
																	<b> Gender </b> <br>
																		<select name='gen[]' class='form-control'>
																			<option value='$row[4]'> $row[4] </option>
																			<option value='Male'> Male </option>
																			<option value='Female'> Female </option>
																			<option value='Other'> Other </option>
																		</select>
																</td>
															</tr>
															
															<tr align='center'>
																<td colspan='4'> <h4> <b> Membership Type, Duration & Fees </b> </h4> </td>
															</tr>
															
															<tr>
																<td align='center'>
																	<b>Membership Type</b>
																	<br>
																	<select name='mem_type[]' class='form-control'>
																		<option value='$row[5]'>  $row[5] </option>";
																		
																		$sql4 = "select * from membership";
																		$rs4 = mysql_query($sql4);
																		
																		while($row4 = mysql_fetch_array($rs4))
																		{
																			echo "<option value='$row4[1]'>  $row4[1] </option>";
																		}
																		
																	echo"
																	</select>	
																</td>
																	
																<td align='center'>
																	<b>Duration</b>
																	<br>
																	<select name='dur[]' class='form-control'>
																		<option value='$row[6]'> $row[6] </option>
																		<option value='1 Month'> 1 Month </option>
																		<option value='2 Months'> 2 Months </option>
																		<option value='3 Months'> 3 Months </option>
																		<option value='4 Months'> 4 Months </option>
																		<option value='5 Months'> 5 Months </option>
																		<option value='6 Months'> 6 Months </option>
																		<option value='7 Months'> 7 Months </option>
																		<option value='8 Months'> 8 Months </option>
																		<option value='9 Months'> 9 Months </option>
																		<option value='10 Months'> 10 Months </option>
																		<option value='11 Months'> 11 Months </option>
																		<option value='12 Months'> 12 Months </option>
																		<option value='13 Months'> 13 Months </option>
																		<option value='14 Months'> 14 Months </option>
																		<option value='15 Months'> 15 Months </option>
																		<option value='16 Months'> 16 Months </option>
																		<option value='17 Months'> 17 Months </option>
																		<option value='18 Months'> 18 Months </option>
																		<option value='19 Months'> 19 Months </option>
																		<option value='20 Months'> 20 Months </option>
																		<option value='21 Months'> 21 Months </option>
																		<option value='32 Months'> 22 Months </option>
																		<option value='23 Months'> 23 Months </option>
																		<option value='2 Years'> 2 Years </option>
																		<option value='3 Years'> 3 Years </option>
																		<option value='4 Years'> 4 Years </option>
																		<option value='5 Years'> 5 Years </option>
																	</select>
																</td>
																	
																<td align='center'>
																	<b>Fees</b>
																	<br>
																	<select name='fees[]' class='form-control'>
																		<option value='$row[7]'> $row[7] </option>
																		<option value='800'> &#x20A8; 800 </option>
																		<option value='1000'> &#x20A8; 1000 </option>
																		<option value='1600'> &#x20A8; 1600 </option>
																		<option value='2000'> &#x20A8; 2000 </option>
																		<option value='2500'> &#x20A8; 2500 </option>
																		<option value='3000'> &#x20A8; 3000 </option>
																		<option value='3500'>&#x20A8; 3500 </option>
																		<option value='4000'>&#x20A8; 4000 </option>
																		<option value='4500'>&#x20A8; 4500 </option>
																		<option value='5000'>&#x20A8; 5000 </option>
																		<option value='6000'>&#x20A8; 6000 </option>
																		<option value='8000'>&#x20A8; 8000 </option>
																		<option value='10000'>&#x20A8; 10000 </option>
																		<option value='14000'>&#x20A8; 14000 </option>
																		<option value='15000'>&#x20A8; 15000 </option>
																		<option value='18000'>&#x20A8; 18000 </option>
																		<option value='25000'>&#x20A8; 25000 </option>
																	</select>	
																</td>
																	
																<td align='center'>
																	<b>Discount</b><br><input type='text' onblur='feespaid()' name='dis[]' value='$row[8]' class='form-control' size='23'>
																</td>
																
															</tr>
															
															<tr align='center'>
																<td colspan='4'> <h4> <b> Amount Details </b> </h4> </td>
															</tr>
															
															<tr>";
																
																$sql2 = "select * from tax";
																$rs2 = mysql_query($sql2);
																
																if($row2 = mysql_fetch_array($rs2))
																{
																	echo"<script>
																			function feespaid()
																			{
																				var a = parseInt(document.editrecord.fees.value);
																				var b = parseInt(document.editrecord.dis.value);
																				
																				var c = a-b;
																				
																				d = c * $row2[1]/100;
																				e = c+d;
																				document.editrecord.pay_tax.value = e;
																			}
																		</script>
																		
																		<td align='center'>
																			<b> Payeble Amount + $row2[1]";
																			echo "% Tax: </b> <br> <input type='text' class='form-control' readonly name='pay_tax[]' value='$row[10]' size='27'> 
																		</td>";
																}
																echo"
																<td align='center'> <b> Fees Paid: </b> <br> <input type='text' class='form-control' name='fpaid[]' value='$row[11]' onblur='dueamount()' size='27'> </td>
																
																<script>
																	function dueamount()
																	{
																		var a = parseInt(document.editrecord.pay_tax.value);
																		var b = parseInt(document.editrecord.fpaid.value);
																		
																		c = a-b;
																		
																		document.editrecord.due.value = c;
																	}
																</script>
																
																<td align='center'> <b> Due: </b> <br> <input type='text' class='form-control' name='due[]'  value='$row[12]' readonly size='27'> </td>
																
																<td align='center'> <b> Paid On: </b> <br> <input type='text' class='form-control' name='paidnon[]' value='$row[13]' size='27' onfocus='show1()'id='inputField1'> </td>
															</tr>
															
															<tr>
																
																<td align='center'> <b> Payment Receipt: </b> <br> <input type='text' class='form-control' name='payrec[]' value='$row[14]' size='27'> </td>
																
																 <td align='center'> <b> Membership Expire: </b> <br> <input type='text' class='form-control' name='memex[]' value='$row[15]' size='27' onfocus='show2()'id='inputField2'> </td>
																 
																 <td align='center'> <b> Days Remaining: </b> <br> <input type='text' class='form-control' name='dayrem[]' value='$row[16]' size='27'> </td>
																 
																<td align='center'> <b> Mobile / Landline: </b> <br> <input type='text' class='form-control' name='mbllnd[]' value='$row[17]'  size='27'> </td>
															</tr>
															
														</table>
														<div  style='margin-top:15px'>
															<input type='submit' class='btn btn-primary' name='update' value='Update Record'>
														</div>
														
												</div>
												
											</div>
											
											<br>";
					}
				
				}
					
											echo	"<center>
														<hr>
												
														<input type='submit' class='btn btn-primary' name='updateall' value='Update All Records' style='width:550px;'>
													</center><br><br>
										</form>
										
										</div>
								
								</center>";
			
			}
			
			if(isset($_POST['update']))
			{
				$id = $_POST["id"];
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
				
				$sql5 = "update addmission set branch='$branch', join_date='$joindate', name='$name' where id ='$id'";
			
				$rs5 = mysql_query($sql5);
				
				if($rs5)
				{
					header("location:first");
					$_SESSION["err"]=1;
				}
			}
		
			if(isset($_POST['updateall']))
			{
				$id = count($_POST["id"]);
				$branch = count($_POST["branch"]);
				$joindate = count($_POST["joindate"]);
				$name = count($_POST["name"]);
				$gen = count($_POST["gen"]);
				$mem_type = count($_POST["mem_type"]);
				$dur = count($_POST["dur"]);
				$fees = count($_POST["fees"]);
				$dis = count($_POST["dis"]);
				$pay_tax = count($_POST["pay_tax"]);
				$fpaid = count($_POST["fpaid"]);
				$due = count($_POST["due"]);
				$paidnon = count($_POST["paidnon"]);
				$payrec = count($_POST["payrec"]);
				$memex = count($_POST["memex"]);
				$dayrem = count($_POST["dayrem"]);
				$mbllnd = count($_POST["mbllnd"]);
				
				include("db.php");
				
				$sql5 = "update addmission set branch='$branch', join_date='$joindate', name='$name' where id ='$id'";
			
				$rs5 = mysql_query($sql5);
				
				if($rs5)
				{
					header("location:vewrecord");
					$_SESSION["err"]=2;
				}
			}
		
			if(isset($_POST['details']))
			{
				echo "Welcome in details";
			}
			
			
		?>
		<div style="margin-top:50px;">
			<div class="navbar navbar-inverse navbar-fixed-bottom">
				<p class="navbar-text" style="align:center"> Powered by @ <b> AITS & JIGNESH PANCHAL</b> </P>
			</div>
		</div>
	</body>
	
</html>