<?php
include("utilities.php");
if(isset($_POST['ID'],$_POST['Value'])){
	$x=$_POST['ID'];
	$y=$_POST['Value'];
	if($_POST['Value']<=0){
		$sql="DELETE from orders where `Order ID`=$x";
		echo $sql;	
	}else{
	$sql="UPDATE orders SET `Quantity`=$y where `Order ID`='$x';";
}
	query($sql);

}
?>