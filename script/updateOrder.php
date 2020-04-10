<?php
include("utilities.php");
if(isset($_POST['ID'],$_POST['Value'])){
	$x=$_POST['ID'];
	$y=$_POST['Value'];
	$sql="UPDATE orders SET `Status`='$y' where `MasterOrder`='$x'";
	echo $sql;
	query($sql);

}
?>