<?php
include("utilities.php");
if(isset($_SESSION['Role'],$_POST['tem'])){
    $tem=json_decode($_POST['tem']);
    $name=$tem->Name;
    $add=$tem->Address;
    $pin=$tem->Pin;
    $_SESSION["Name"]=$name;
	$_SESSION["Address"]=$add;
	$_SESSION["Pin"]=$pin;
	$email=$_SESSION['EmailId'];
	$sql="UPDATE users SET `Name`='$name',`Address`='$add',`Pin`='$pin' where `Email`='$email'";
	echo $sql;
	query($sql);

}else{
    echo "no";
}
?>