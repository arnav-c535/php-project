<?php
$pwd="";

if(isset($_POST["resetbtn"])){

	$connect = mysqli_connect("localhost","root","","studentdb");
	$eid = $_POST["eid"];
	$mob = $_POST["mob"];

	$qry = "SELECT * FROM `student` WHERE studemail='$eid'
	AND studmobile='$mob' ";

	$result=mysqli_query($connect,$qry);

	$row=mysqli_num_rows($result);

	if($row>0){
	 	$pwd = randomPassword();
	 	$qry1="UPDATE `student` SET `studpassword`='$pwd' WHERE studemail='$eid'
	AND studmobile='$mob' ";

	$result1=mysqli_query($connect,$qry1);

	if(!$result1){
		echo error;
	}

	 }
	 else{
	 	echo "invalid email or password";
	 }
	 
}




function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@#$";
    $pass = "";
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $pass .= $alphabet[rand(0, $alphaLength)];
    }
    return $pass;
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>header</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
	<div class="container vh-100 align-items-center d-flex">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<form method="post">
					<div class="card-header">
						<h1>Reset Password</h1>
					</div>

					<div class="card-body">
						<div>
							<label>Email</label>
							<input type="email" class="form-control" name="eid">	
						</div>

						<div>
							<label>Mobile no.</label>
							<input type="tel" class="form-control" name="mob">	
						</div>
					</div>

					<button class="btn btn-success m-5" name="resetbtn">Change Password</button>
				</form>
			</div><?php if($pwd){ ?>
			<p>Your password is reseted to <a class="text-danger"><?php echo $pwd;?></a> Kindly copy it</p>
			<p><a href="../project1/login.php">Login now</a></p>
		<?php } ?>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	


</body>
</html>