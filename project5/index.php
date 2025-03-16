<?php

$connect = mysqli_connect("localhost", "root", "", "studentdb");

if(!$connect)
{
	?> <script>alert("data base is not connected");</script>  <?php
}





if(isset($_POST["savebtn"]))
{

	$eid = $_POST["eid"];
	$pwd = $_POST["pwd"];
	$newpwd = $_POST["newpwd"];
	$conpwd = $_POST["conpwd"];


	$qry = "select * from student where studemail = '$eid' AND studpassword = '$pwd'";

	$result = mysqli_query($connect, $qry);

	$row = mysqli_num_rows($result);



	if($row>0)
	{
		if($newpwd == $conpwd){
			$qry1="UPDATE `student` SET `studpassword`='$newpwd' WHERE  studemail = '$eid' AND studpassword = '$pwd'";


			$result1 = mysqli_query($connect, $qry1);

			$row1 = mysqli_num_rows($result1);
			if ($row1>0) {
			   	echo "<script>conform('password changed successfully');</script>";
			}
		}
		else{
			echo "<script>alert('please enter same password');</script>";
		}
	   

	} 
	else {
	    echo "<script>alert('Invalid Password');</script>";
	}
}



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
						<div class="col-md-8 mx-auto">
	                    	<form method="post">
	                    		<div>
									<label>Enter Email id :- </label>
									<input type="email" placeholder="Email" name="eid" class="form-control mb-3">
								</div>
	     						<div>
									<label>Enter password :- </label>
									<input type="password" placeholder="old password" name="pwd" class="form-control mb-3">
								</div>
								<div>
									<label>New password :- </label>
									<input type="password" placeholder="new password" name="newpwd" class="form-control mb-3">
								</div>
								<div>
									<label>Conform Password :- </label>
									<input type="password" placeholder="conform password" name="conpwd" class="form-control mb-3">
								</div>               		

								<button type="submit" name="savebtn" class="btn btn-success">Save</button>
		                    </form>
	                    </div>




	                    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>