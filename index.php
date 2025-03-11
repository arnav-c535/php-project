<?php

session_start();
if(isset($_SESSION["uid"]))
{
    header("location:user.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("allheadercdn.php"); ?>
</head>
<body>

	<?php include("nav.php"); ?>

</body>
</html>