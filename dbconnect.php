<?php

$connect = mysqli_connect("localhost", "root", "", "studentdb");

if(!$connect)
{
	?> <script>alert("data base is not connected");</script>  <?php
}

?>