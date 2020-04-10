<?php
include("utilities.php");
$_SESSION["jsonData"]=json_encode($_GET);
header("Location: ../user_details.php");
?>  