	<?php
include("utilities.php");
if(isset($_POST['ID']) && isset($_POST['Password'])){
$id=$_POST["ID"];
$password=$_POST["Password"];
$x=get_data("select * from employee where ID='$id' and Password='$password'");
$x=json_decode(($x));
if(count($x)>=1){
	$_SESSION['Role']="Employee";
	$_SESSION['Name']=$x[0]->Name;
	$_SESSION['ID']=$x[0]->ID;
}
print_r(count($x));
}else{
	error();
}
?>