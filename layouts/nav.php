<nav class=" fixed-top" style="background-color:  #3292a6">
 <div class="container">
   <div class="row">
     <div class="col text-right" >
     <?php
     if(!isset($_SESSION["Role"])){
       echo'
       <a href="login.php" class="mx-3"  style="color: white; text-decoration: none; font-size:large;">Login</a>
       <a href="signup.php" class="mx-3"  style="color: white; text-decoration: none;">Sign Up</a>
       ';
     }else if($_SESSION["Role"]=="Customer"){

      echo "";
        echo'
       <a href="userOrderList.php" class="mx-3"  style="color: white; text-decoration: none; font-size:large;">Welcome '.$_SESSION["Name"].'</a>
       <a href="userOrderList.php" class="mx-3"  style="color: white; text-decoration: none;">Orders</a>
        <a href="scripts/logout.php" class="mx-3"  style="color: white; text-decoration: none;"  onclick="location.href=\'scripts/logout.php\'">Logout</a>
       ';

     }

       ?>
     </div>
   </div>
 </div>
</nav>
<nav id="main-nav" class="navbar navbar-expand-sm navbar-light fixed-top mt-4 py-3">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <img src="Image/pizza-slice.png" width="50" height="50" >
        <h3 class="d-inline align-middle">Pizzeria</h3>
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="myNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Order Pizza
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="veg_pizza.php">Veg Pizza</a>
            <a class="dropdown-item" href="nonVeg-pizza.php">Non Veg Pizza</a>
          </div>
        </li>
          <li class="nav-item">
            <a href="non-pizza.php" class="nav-link">Non Pizza</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="cart.php" class="btn btn-primary nav-link cart"><i class="fab fa-opencart mx-2"></i>My Cart (<?php

if(isset($_SESSION['EmailId'])){
$x=$_SESSION['EmailId'];

$x=(get_data("SELECT count(*) as TotalInCart from orders where Status='No' and Email='$x'"));
$x=json_decode($x);
print_r($x[0]->TotalInCart);
}else{
  echo 0;
}
              ?>)</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

  