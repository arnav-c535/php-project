<?php
SESSION_start();

if(isset($_SESSION["uid"]))
{
    header("location:user.php");
}

if(isset($_POST["loginbtn"]))
{
	include("dbconnect.php");	
	
	$eid = $_POST["email"];
	$pwd = $_POST["password"];

	if($eid == "admin" AND $pwd == "admin")
	{
		header("location:admin.php");
	}


	$qry = "SELECT * FROM `student` WHERE studemail = '$eid' AND studpassword = '$pwd' ";

	$result = mysqli_query($connect, $qry);

	$row = mysqli_num_rows($result);



	if($row>0)
{
    $data = mysqli_fetch_assoc($result);
    $_SESSION["uid"] = $data['sid'];

    echo "<script>
        alert('Welcome!');
        window.location.href='user.php';
    </script>";
    exit();
}
else {
    echo "<script>alert('Invalid Email or Password');</script>";
}



}
?>


<html>
<head>
	<title>	Login Form</title>

<?php include("allheadercdn.php"); ?>
	
</head>
<body class="bg-light">

		<div class="container my-5">
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="card bg-secondary text-light">
						<div class="card-body p-5">
							<form method="POST">
								<h1 class="text-info">Login Form</h1>
									<div>	
										<div>
											<label>Email ID :- </label>
											<input type="text" name="email" placeholder="username" class="form-control mb-3">
										</div>
										<div>
											<label>Password :- </label>
											<input type="password" name="password" placeholder="Password" class="form-control mb-3">
										</div>
										<div>
											<p><a href="../project4">forget password</a></p>
										</div>
									</div>


								
								<button class="btn btn-primary btn-outline-success text-warning" name="loginbtn">login</button>
							</form>
						</div>
					</div>

					<p class="mt-3">Don't have an Acount <a href="register.php">Sign up</a></p>


				</div>
			</div>
		</div>






<?php 	include("allfootercdn.php"); ?>



</body>
</html>
