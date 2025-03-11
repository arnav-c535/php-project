
<?php

SESSION_start();

if(isset($_POST["submitbtn"]))
{
	include("dbconnect.php");

	$notice = $_POST["notice"];


	$qry = "INSERT INTO `notice`(`notice`) VALUES ('$notice')";

	$result = mysqli_query($connect, $qry);
	
	if($result)
	{
		?> <script> alert("notice published successfully");</script> <?php
	}
	else
	{
		?> <script> alert("Fail to submit notice");</script> <?php

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php include("allheadercdn.php"); ?>

</head>
<body>

	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="list-group vh-100 bg-light">
					  <a href="#" class="list-group-item list-group-item-action">Home</a>
					  <a href="login.php" class="list-group-item list-group-item-action">logout</a>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="card bg-light vh-100">
					<h2>Admin Panel</h2>
		            <form method="post">
		                <div class="mb-3">
		                    <label for="notice" class="form-label">Add Notice</label>
		                    <textarea id="notice" name="notice" class="form-control" required style="resize: none; height: 200px;"></textarea>
		                </div>
		                <button type="submit" name="submitbtn" class="btn btn-primary">Add Notice</button>
		            </form>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>