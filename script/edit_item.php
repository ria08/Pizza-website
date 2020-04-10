<?php
include("utilities.php");
if(isset($_POST["itemId"])){
	$x=$_POST['itemId'];
$result =	mysqli_query($connection, "select * from item where ItemName='$x'");
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
}

?>