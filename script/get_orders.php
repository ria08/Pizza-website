<?php
include("utilities.php");
$obj = new \stdClass();
$obj->Pending=get_row_count("select * from orders where status='Pending' group by MasterOrder");
$obj->Rejected=get_row_count("select * from orders where status='Rejected' group by MasterOrder");
$obj->Delivered=get_row_count("select * from orders where status='Delivered' group by MasterOrder");
$obj->Total=get_row_count("select * from orders group by MasterOrder");
$obj->OrderId=get_orders_ids();
$obj->TotalAmount=get_amount();

$a=get_data("select * from orders where status='Pending' order by Time");
if(count(json_decode($a))!=0)
$tem=array_merge(array($obj),json_decode($a,true));
else 
	$tem=$obj;
echo json_encode($tem);


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
	if(count($x))
	return $x[0]->sum;
return 0;
}
?>
