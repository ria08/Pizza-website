<?php
include("utilities.php");
    $personData = json_decode($_REQUEST["data"]);
	$name = $personData->name;
	$email = $personData->email;
	$password = $personData->pass;
	$cpassword= $personData->confirmPass;
	$mobile = $personData->mobile;
	$address = $personData->address;
	$pincode = $personData->pinCode;
	$error = false;
	$message = "";
    $status = "";
	$query= "SELECT * FROM users WHERE Email = '$email' or Mobile='$mobile'";
	if(get_row_count($query)== 0){
		$query = "INSERT INTO users (Name,Email,Password,Mobile,Address,Pin) VALUES ('$name','$email','$password','$mobile','$address','$pincode')";
		$Result =	mysqli_query($connection,$query);
		if($Result){
			$status = "1";
			$message = "Success";
		}
		else{
			$status = "0";
			$message = "Not Registered";
		}		
	}
	else{
		$status = "0";
		$message = "User is Already registered with this E-mail or mobile number,Please try another one!";
	}

$output = new \stdClass();
$output->status=$status;
$output->message=$message;
print json_encode($output);
?>