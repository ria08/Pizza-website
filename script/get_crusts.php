<?php
include("utilities.php");
print get_data("SELECT DISTINCT(`Crust Name`),Price FROM `crusts`");

?>