<?php
$error_message="";
$base="pizza";
session_start();
if(!isset($connection)){
$db="pizzeria";
$host="localhost";
$username="root";
$password="";
$connection=mysqli_connect($host,$username,$password,$db);

}
function isCustomerLoggedIn(){

	if( isset($_SESSION["Role"]) && $_SESSION["Role"]=="Customer"){

	}else{
	 header("Location: login.php");


	}



}

function helper(){

}

function getNoCart(){
	$x=$_SESSION['EmailId'];
$x=(get_data("SELECT count(*) as TotalInCart from orders where Status='No' and Email='$x'"));
$x=json_decode($x);
return($x[0]->TotalInCart);
}

function alert($message,$type){
	$tem='<div class=" alert alert-';
	if($type=="e"){
		$tem=$tem.'danger"';
	}else if($type=="s"){
		$tem=$tem.'success"';
		
	}else{
		$tem=$tem.'danger"';

	}
	$message=$tem.'role="alert">* '.$message.'</div>';
  echo $message;
	
}

function query($query,$success="Success",$error="Error"){
	global $connection;

if(!mysqli_query($connection, $query)){
	return 0; //error 

}
return 1;// success
}

function login($role){
	if(!isset($_POST["user"]) || !isset($_POST["password"]))return;
	if($role=="Admin" && $_SERVER["REQUEST_METHOD"] == "POST"){
	
			$x="select * from adminusers where EmailId ='".$_POST["user"]."' and password='".$_POST["password"]."'";
		$x=get_data($x);
		$x=json_decode($x);
		if(count($x)){
			 echo "Logged In Succesfully";
			 $_SESSION["Role"]="Admin";
			 $_SESSION["EmailId"]=$x[0]->EmailId;
			 $_SESSION["Username"]=$x[0]->Username;
			 $_SESSION["Name"]=$x[0]->Name;

 header("Location: admin_panel.php");
		}else{
			$error_message= " Invalid Username or Password";
			echo '<script>alert("'.$error_message.'")</script>';
		}
		
	
	}


}
function error(){
	header("Location: error.php");
	
}
function add_item(){
	if(!(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))){

$target_dir = "PizzaImages/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
      
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.","w");
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    alert ("Sorry, your file was not uploaded.","e");
    return;
} else {
  
}
$ln=$_FILES["file"]["name"];
	$in=isset($_POST["item_name"])?$_POST["item_name"]:$_SESSION["item_name"]; //itme_name

$op=$_POST["optradio"]; //Category pizza or non-pizza
$veg=$_POST["VegOrNot"]; //type veg or not
$pr=$_POST["price"];//pricel
}else{
	$ln=!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])?$_SESSION['updateMode']:$_FILES["file"]["name"];
	$in=isset($_POST["item_name"])?$_POST["item_name"]:$_SESSION["item_name"]; //itme_name
$op=isset($_POST["optradio"])?$_POST["optradio"]:$_SESSION["optradio"]; //Category
$veg=isset($_POST["VegOrNot"])?$_POST["VegOrNot"]:$_SESSION["type"]; //type
$pr=isset($_POST["price"])?$_POST["price"]:$_SESSION["price"];//pricels
}


if(!isset($_SESSION['updateMode']) ){
if(already_Exists("select * from item where ItemName='$in'")){
	alert("Item Name Already Exists","e");


}else{

query("insert into item values('$in','$pr','$veg','$ln','$op')");
alert("Item Added Successfully","s");
	
}


}else{

	query("delete from item where ItemName='$in'");
query("insert into item values('$in','$pr','$veg','$ln','$op')");
alert("Item Updated Successfully","s");


}
unset($_SESSION['updateMode']);
header(("Location: list_item.php"));
}
function already_Exists($sql){
	global $connection;
  	$res_u = mysqli_query($connection, $sql);
	return   $res_u && mysqli_num_rows($res_u)!=0;

}
function get_items(){
$query = "SELECT * FROM item";
 global $connection;
if ($result = $connection->query($query)) {
	
    while ($row = $result->fetch_assoc()) {
		echo "<tr id='".$row['ItemName']."''>";
		echo "<td>";
		echo $row["ItemName"];
		echo "</td>";
		echo "<td>";
		
		echo $row["Pizza"];
		echo "</td>";
		echo "<td>";
		echo $row["Type"];
		echo "</td>";
		echo "<td>";
	echo $row["Price"];
		echo "</td>";
		echo "<td>";
		echo $row["link"];
		echo "<td>";
			echo ' <button class="btn btn-info " type="button"
 onClick=
			"edit_item(\''.$row["ItemName"].'\');"  
			>Edit
			</button>
            <button class="btn btn-danger" type="button"
             onClick=
			"delete_item(\''.$row["ItemName"].'\');"  
               >Delete</button>';


		echo "</tr>";
		
	}
	
 
    $result->free();
}
}

function add_ingredients(){
$ln;
$pr;
$veg;
$in;

	if(!(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))){

$target_dir = "PizzaImages/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
      
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.","w");
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    alert ("Sorry, your file was not uploaded.","e");
    return;
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    } else {
    }
}
$ln=$_FILES["file"]["name"];
$in=isset($_POST["ItemName"])?$_POST["ItemName"]:$_SESSION["Item Name"]; //itme_name

$veg=$_POST["Type"]; //type veg or not
$pr=$_POST["price"];//pricel
}else{
	$ln=!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])?$_FILES["file"]["name"]:$_SESSION['updateMode'];
	if(!strlen($ln)){
$ln=$_SESSION['updateMode'];
	}
	$in=isset($_POST["ItemName"])?$_POST["ItemName"]:$_SESSION["Item Name"]; //itme_name
$veg=isset($_POST["Type"])?$_POST["Type"]:$_SESSION["Type"]; //type
$pr=isset($_POST["price"])?$_POST["price"]:$_SESSION["price"];//pricels
}

if(!isset($_SESSION['updateMode']) ){
if(already_Exists("select * from item where ItemName='$in'")){
	alert("Item Name Already Exists","e");


}else{

query("insert into ingredients values('$in','$veg','$Price','$ln')");
	
}


}else{
	query("delete from ingredients where `Item Name`='$in'");
query("insert into ingredients values('$in','$veg','$pr','$ln')");
alert("Ingredients Updated Successfully","s");


}
unset($_SESSION['updateMode']);
header( "Location: list_ingred.php");
}

function get_ingredients(){
$query = "SELECT * FROM ingredients";
 global $connection;
if ($result = $connection->query($query)) {
	
    while ($row = $result->fetch_assoc()) {
		echo "<tr id='".$row['Item Name']."''>";
		echo "<td>";
		echo $row["Item Name"];
		echo "</td>";
			echo "<td>";
		echo $row["Type"];
		echo "</td>";
		echo "<td>";
		
		echo $row["Price"];
		echo "</td>";

		echo "<td>";
		echo $row["Image"];
		echo "<td>";
			echo ' <button class="btn btn-info " type="button"
 onClick=
			"edit_ingredients(\''.$row["Item Name"].'\');"  
			>Edit
			</button>
            <button class="btn btn-danger" type="button"
             onClick=
			"delete_ingredients(\''.$row["Item Name"].'\');"  
               >Delete</button>';


		echo "</tr>";
		
	}
	
 
    $result->free();
}
}
function get_data($s){
	global $connection;
	$result =	mysqli_query($connection, $s);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
return json_encode($rows);

}
function get_data_raw($s){
	global $connection;
	$result =	mysqli_query($connection, $s);
	return $result;
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
return ($rows);

}

function get_row_count($sql){
	global $connection;




if ($result=mysqli_query($connection,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  mysqli_free_result($result);
  return $rowcount;
  }
  return 0;


}

?>
