<?php
include("utilities.php");
if($_SESSION['Role']=='Admin'){
$x="Location: ../admin_log.php";
}else if($_SESSION['Role']=='Employee'){
	$x="Location: ../emp_log.php";
}else{
	$x="Location: ../index.php";
}
session_destroy();
header($x);
?>