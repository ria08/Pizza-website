<?php
include("utilities.php");

if(isset($_POST['Submit'])){
	if(!(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))){
$target_dir = "../PizzaImages/ingredients/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["Submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
      
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    alert ("Sorry, your file was not uploaded.","e");
    return;
} else {
   move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) ;
}
$in=$_POST["ItemName"]; //Item Name
$type=$_POST["Type"]; //Type
$pr=$_POST["Price"];//price 
$ln=$_FILES["file"]["name"];
query("insert into ingredients values('$in','$type','$pr','$ln')");
// alert("ingredients Added Successfully","s");
// header( "Refresh:5; url=../list_ingred.php", true, 303);
header( "Location: ../list_ingred.php");

}
}else{
	echo "error";
}

?>