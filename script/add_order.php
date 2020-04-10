<?php
include("utilities.php");
if(isset($_POST['Name'],$_POST['Password'],$_POST['ID'])){
	$x=$_POST['ID'];
	if(already_exists("select * from employee where ID='$x'")){

		alert("* Employee ID already exists","e");

	}else{
		$a=$_POST['Name'];
		$b=$_POST['Password'];
		$c=$_POST['ID'];

		query("insert into employee values('$a','$b','$c')");
		alert("* Employee Added Successfully",'s');

	}
}
?>