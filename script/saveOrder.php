<?php
include("utilities.php");
				if(getNoCart()==0){
				echo "No Item in Cart";
				return;
				}
	$x=session_id();
	$sql="UPDATE orders SET `Status`='Pending' where `SID`='$x';";
	query($sql);
	$y=get_next_id();
	$sql="UPDATE orders SET `MasterOrder`='$y' where `SID`='$x';";
	query($sql);

	print_r($y);
	function get_next_id(){
		$x=get_data("SELECT Max(CAST(MasterOrder as SIGNED)) as ans FROM orders;");
		$x=json_decode($x);
		$x=$x[0]->ans;
		
	$x=intval($x);
	$x++;
	return $x;

	}
?>
