<?php
include("utilities.php");
if(isset($_POST["itemId"])){
	$tem="DELETE from item where ItemName='".$_POST["itemId"]."';";
	echo query($tem);
}
?>