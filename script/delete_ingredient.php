<?php
include("utilities.php");
if(isset($_POST["itemId"])){
	$tem="DELETE from ingredients where `Item Name`='".$_POST["itemId"]."';";
	echo $tem;
	echo query($tem);
}
?>