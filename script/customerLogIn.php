<?php
include("utilities.php");
    $personData = json_decode($_REQUEST["data"]);
	// $name = $personData->name;
	$email = $personData->email;
	$password = $personData->pass;

	$query= "SELECT * FROM users WHERE Email = '$email' and Password='$password'";
	if(get_row_count($query)!=0){
     	$x=$query;
		$x=get_data($x);
		$x=json_decode($x);
		if(count($x)){
			//  echo "Logged In Succesfully";
			 $_SESSION["Role"]="Customer";
			 $_SESSION["EmailId"]=$x[0]->Email;
			 $_SESSION["Name"]=$x[0]->Name;  //?
			 $_SESSION["Address"]=$x[0]->Address;
			 $_SESSION["Mobile"]=$x[0]->Mobile;
			 $_SESSION["Pin"]=$x[0]->Pin;


             
            print(1);
    }
}
    return 0;


?>