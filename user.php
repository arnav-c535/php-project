<?php

SESSION_start();


if(!isset($_SESSION["uid"]))
{
	header("location:login.php");
}

$id = $_SESSION["uid"];

include("dbconnect.php");

$qry = "select * from student where sid = '$id'";

$result = mysqli_query($connect, $qry);

$data = mysqli_fetch_assoc($result);

$qry1 = "SELECT * FROM `notice` ORDER BY uploaded_time DESC";
$result1 = mysqli_query($connect, $qry1);

?>


<?php



if(isset($_POST["loginbtn"]))
{
	$pwd = $_POST["pwd"];
	$newpwd = $_POST["newpwd"];
	$conpwd = $_POST["conpwd"];


	$qry = "select * from student where sid = '$id'";

	$result = mysqli_query($connect, $qry);

	$data = mysqli_fetch_assoc($result);



	if($data["studpassword"] === $pwd)
{
	if($newpwd == $conpwd){
		$qry1="UPDATE `student` SET `studpassword`='$newpwd' WHERE sid = '$id' ";

		   $result = mysqli_query($connect, $qry1);
		   if ($result) {
		   	echo "<script>alert('password changed successfully');</script>";
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

	<?php include("allheadercdn.php"); ?>


	<style>
		.container div{
			margin-bottom: 50px;
			color: blue;
		}
	</style>

</head>
<body>

	<?php include("nav.php"); ?>

	<?php $latest_notice = mysqli_fetch_assoc($result1); ?>
	<marquee class="text-warning"> 
	    New notice added on: <?php echo $latest_notice["uploaded_time"]; ?>
	</marquee>





	

	<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-3">
            <div class="card">
                <div class="list-group vh-100  bg-light">
                    <a href="#dashboard" class="list-group-item list-group-item-action active" data-toggle="tab">Dashboard</a>
                    <a href="#notice" class="list-group-item list-group-item-action" data-toggle="tab">Notice</a>
                    <a href="#changepwd" class="list-group-item list-group-item-action" data-toggle="tab">Change Password</a>
                    <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
        	<div class="container-fluid vh-100 bg-light">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="dashboard">
                    <h3>Dashboard</h3>
                    <p>Welcome to your dashboard!</p>
                </div>

                <div class="tab-pane fade" id="notice">
                    <h3>Notices</h3>
                    <?php 
                    echo "<strong>Latest Notice:</strong> " . $latest_notice["notice"] . "<br><small>Uploaded on: " . $latest_notice["uploaded_time"] . "</small>";

                    mysqli_data_seek($result1, 0); // Reset pointer

                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<div><strong>Notice:</strong> " . $row["notice"] . " <br><small>Uploaded on: " . $row["uploaded_time"] . "</small></div>"; 
                    }
                    ?>
                </div>

                <div class="tab-pane fade" id="changepwd">
                    	<div class="col-md-8 mx-auto">
                    	<form method="post">
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap 4 and jQuery (Ensure these are included in allheadercdn.php or before </body>) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>



</body>
</html>