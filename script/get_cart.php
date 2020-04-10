<?php
include("utilities.php");
$x=$_SESSION['EmailId'];
$a="select * from orders where Email='$x' && Status='No'";
echo (get_data($a));
?>
