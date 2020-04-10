<?php
include('utilities.php');
if(isset($_POST['Name'],$_POST['Email'],$_POST['Msg'])){
	$n=$_POST['Name'];
	$e=$_POST['Email'];
	$m=$_POST['Msg'];
	$sql="insert into feedbacks values('$n','$e','$m')";
	query($sql);
}

?>