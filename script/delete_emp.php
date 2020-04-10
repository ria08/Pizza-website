<?php
include("utilities.php");
$x=$_POST['ID'];
 	query("delete from employee where ID='$x'");
alert("* Employee deleted succesfully","s");
?>