<?php
include("utilities.php");
$obj = new \stdClass();
$obj->Total=get_row_count("select * from orders where status='Pending'");
$obj->OrderId=$_GET['ID'];
$obj->Items=get_items1();



function get_orders_ids(){
$x=get_data("select DISTINCT(masterorder) from orders where status='Pending'");
		$x=json_decode($x);
		$y=array();
foreach((array)$x as $item) {
	if($item->masterorder!="")
        $y[] = $item->masterorder;
}
		return 	($y);
}
function get_amount(){

	$x=get_data("select SUM(`quantity`*`Amount`*1.18) as sum from orders where status='Pending' GROUP BY masterorder");
	$x=json_decode($x);
	return $x[0]->sum;
}

function get_items1(){
	global $obj;
	$te=get_data("select * from orders where status='Pending' and masterorder='$obj->OrderId'");
	$te=get_data("SELECT orders.*,item.* from orders join item on orders.`Item Name`=item.ItemName where status='Pending'  and masterorder='$obj->OrderId'");

	echo $te;



}
?>
