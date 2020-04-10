<?php
include('utilities.php');
if(isset($_POST['Name'],$_POST['Email'])){
	$n=$_POST['Name'];
	$e=$_POST['Email'];
	$sql="insert into subscribers values('$n','$e')";
	query($sql);
}

?>