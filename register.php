<?php
SESSION_start();

if(isset($_POST["regbtn"]))
{
	include("dbconnect.php");

	$fn = $_POST["name"];
	$eid = $_POST["email"];
	$pwd = $_POST["password"];
	$dob = $_POST["dob"];
	$mob = $_POST["mobile"];
	$city = $_POST["city"];

	$qry = "INSERT INTO `student`(`studname`, `studemail`, `studpassword`, `studdob`, `studmobile`, `studcity`) VALUES ('$fn','$eid','$pwd','$dob','$mob','$city')";

	$result = mysqli_query($connect, $qry);

	if($result)
	{
		?> <script> alert("Registration Success");</script> <?php
		header("location:user.php");
	}
	else
	{
		?> <script> alert("Fail to Register");</script> <?php

	}

}



?>




<!DOCTYPE html>
<html>
<head>
	<title>	Registration Form</title>

<?php include("allheadercdn.php"); ?>
	
</head>
<body class="bg-light">

		<div class="container my-5">
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="card bg-secondary text-light">
						<div class="card-body p-5">
							<form method="POST">
								<h1 class="text-info">Registration Form</h1>

								<div class="row">
									<div class="col-md-6">
										<div>
											<label>Full Name :- </label>
											<input type="text" name="name" class="form-control mb-3">
										</div>
										<div>
											<label>Email ID :- </label>
											<input type="email" name="email" class="form-control mb-3">
										</div>
										<div>
											<label>Password :- </label>
											<input type="password" name="password" class="form-control mb-3">
										</div>
									</div>


									<div class="col-md-6">
										<div>
											<label>Date of Birth :- </label>
											<input type="date" name="dob" class="form-control mb-3">
										</div>
										<div>
											<label>Mobile no. :- </label>
											<input type="text" name="mobile" class="form-control mb-3">
										</div>
										<div>
											<label class="form-label">City</label>
					                        <select class="form-control"  name="city">
					                            <option value="">Select city</option>
					                            <option value="amravati">amravati</option>
					                            <option value="kurha">kurha</option>
					                            <option value="nagapur">nagapur</option>
					                        </select>
										</div>
									</div>
								</div>


								
								<button class="btn btn-primary btn-outline-success text-warning" name="regbtn">register</button>
							</form>
						</div>
					</div>

					<p class="mt-3">Already have an Acount <a href="login.php">Sign in</a></p>
				</div>
			</div>
		</div>






<?php 	include("allfootercdn.php"); ?>



</body>
</html>