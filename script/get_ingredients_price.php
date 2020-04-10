<?php
include('utilities.php'); 
if(isset($_GET['Name'])){
	$x=$_GET['Name'];
print (get_data("select Price from ingredients where `Item Name`='$x'"));

}
else 
error();
?>