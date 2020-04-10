<?php
include('utilities.php'); 
if(isset($_GET['ID'])){
	$x=$_GET['ID'];
print (get_data("SELECT Price FROM `item` where ItemName=(SELECT `Item Name` from orders where `Order ID`='$x')"));


}
else 
error();
?>