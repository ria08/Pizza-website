<?php
include("utilities.php");
if(isset($_GET['category']) && isset($_GET['type'])){
$category=$_GET["category"];
$type=$_GET["type"];
if($_GET['category']=='Non-Pizza'){
print get_data("select * from item where Pizza='$category'");

}else
print get_data("select * from item where Type='$type' and Pizza='$category'");
}
?>