<?php
include("utilities.php");
// $y=get_next_id();
// echo $y;
// return;

				if(getNoCart()==0){
				echo "No Item in Cart";
				return;
				}
	$x=$_SESSION['EmailId'];
	$output = new \stdClass();
$output->Price=json_decode(get_data("select Round(SUM(cast(Amount as decimal(10,2))*cast(Quantity as decimal(10,2))*1.18),2) as Price from orders where Email='$x' and Status='No'"))[0]->Price;

	$y=get_next_id();
	$sql="UPDATE orders SET `MasterOrder`='$y' where `Email`='$x' and Status='No'";
	query($sql);

	$sql="UPDATE orders SET `Status`='Pending' where `MasterOrder`='$y'";
	query($sql);
			
$output->OrderID=$y;
	print_r(json_encode($output));
	function get_next_id(){
		$x=get_data("SELECT Max(CAST(MasterOrder as SIGNED)) as ans FROM orders;");
		$x=json_decode($x);
		$x=$x[0]->ans;
		
	$x=intval($x);
	$x=$x+1;
	return $x;

	}
?>
