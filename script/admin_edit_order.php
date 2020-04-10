<?php
include("utilities.php");
if(isset($_GET['obj'])){
$tem=json_decode($_GET['obj']);
$ingredients=$tem->Ingredients;
$amount=$tem->Amount;
$quantity=$tem->Quantity;
$id=$tem->ID;
$sql="update orders set Ingredients='$ingredients',Amount='$amount',Quantity='$quantity' where `Order ID`='$id'";
query($sql);
}else
error();

?>