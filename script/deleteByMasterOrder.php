<?php
include("utilities.php");
if(isset($_GET['ID'])){
$x=$_GET['ID'];
query("delete from orders where `MasterOrder`='$x'");
}
header("Location: ../order_list.php");
?>