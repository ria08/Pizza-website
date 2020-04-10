<?php
include('utilities.php'); 
if(isset($_GET['ID'])){
	$x=$_GET['ID'];
$s="select SUM(cast(Amount as decimal(10,2))*cast(Quantity as decimal(10,2))*1.18) as Price from orders where `MasterOrder`='$x'";

print_r(get_data($s));
}
else 
error();
?>