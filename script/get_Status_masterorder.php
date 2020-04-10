<?php
include('utilities.php'); 
if(isset($_GET['ID'])){
	$x=$_GET['ID'];
$s="select Status from orders where `MasterOrder`='$x'";

print_r(get_data($s));
}
else 
error();
?>