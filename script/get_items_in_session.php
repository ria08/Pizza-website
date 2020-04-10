<?php
include("utilities.php");
$x=session_id();
print_r(get_data("SELECT count(*) as TotalInCart from orders where Status='No' and SID='$x'"));
?>