<?php
include("utilities.php");
// print "asdas";
if(isset($_SESSION['jsonData'])){
$tem=$_SESSION['jsonData'];
// $b=isset($_POST['UD'])?$_POST['UD']:$_SESSION['UD'];
// if(isset($_POST['UD']))
// $_SESSION['UD']=$_POST['UD'];
// $tem=array_merge(json_decode($a, true),json_decode($b, true));
$tem=json_decode($tem,true);
$Name=$_SESSION['Name'];
$Email=$_SESSION['EmailId'];
$Address=$_SESSION['Address'];
$ItemName=$tem['ItemName'];
$Amount=$tem['Amount'];
$s=session_id();
if(isset($tem['Ingredients'])){
$Ingredients=$tem['Ingredients'];
$Ingredients = implode(',', $Ingredients);
query("insert into `orders`(`Name`,`Email`,`Address`,`Item Name`,`Amount`,`Ingredients`,`SID`) values('$Name','$Email','$Address','$ItemName','$Amount','$Ingredients','$s')");
// echo "insert into `orders`(`Name`,`Email`,`Address`,`Item Name`,`Amount`,`Ingredients`,`SID`) values('$Name','$Email','$Address','$ItemName','$Amount','$Ingredients','$s')";
}else{
query("insert into `orders`(`Name`,`Email`,`Address`,`Item Name`,`Amount`,`SID`) values('$Name','$Email','$Address','$ItemName','$Amount','$s')");
// echo "insert into `orders`(`Name`,`Email`,`Address`,`Item Name`,`Amount`,`SID`) values('$Name','$Email','$Address','$ItemName','$Amount','$s')";
}
// if(isset($_SESSION['jsonData']))unset($_SESSION['jsonData']);
// header("Location: ../cart.php");


}
?>