<?php
include("utilities.php");
// var_dump($_POST);
// query()
if(isset($_POST['Name'],$_POST['Password'],$_POST['ID'])){
	$x=$_POST['ID'];
	// echo "select * from employee where ID='$x'";
	// echo already_exists("")
	if(already_exists("select * from employee where ID='$x'")){

		alert("* Employee ID already exists","e");

	}else{
		$a=$_POST['Name'];
		$b=$_POST['Password'];
		$c=$_POST['ID'];

		query("insert into employee values('$a','$b','$c')");
		alert("* Employee Added Successfully",'s');
		// header(red5)
// header( "Refresh:3;url=../emp_list.php",true,303 );
// header( "Refresh:5; url=../emp_list.php", true, 303);
 // header("Location: ../emp_list.php");

	}
}
?>