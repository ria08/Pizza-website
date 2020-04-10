<?php

include("utilities.php");
if(isset($_POST["ItemName"])){
	$x=$_POST['ItemName'];
$result =	mysqli_query($connection, "select * from ingredients where `Item Name`='$x'");
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
}else{
}

?>