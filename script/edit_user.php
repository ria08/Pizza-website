<?php
include('layouts/panel_top.php');
?>

<script type="text/javascript">
 $(document).ready(function(){
    // sen();
    $("#updateButton").click(function(e){
      var data1={Name:$("#name").val(),Address:$("#Textarea1").val(),Pin:$("#pin").val()};
      
      data1=JSON.stringify(data1);
    // console.log(data1);
         $.ajax({
          url:'scripts/updateCustomer.php',
          type:'POST',
          data:"tem="+data1,
          success:function(data){
             Swal.fire({ position: 'center',  type: 'success', title: 'Profile Updated Successully', showConfirmButton: false,timer: 2000 });
             setTimeout(() => {
               window.location.href="userOrderList.php";
             }, 1000);
// alert(data);
            // console.log(data);
            // if(data=="No Item in Cart"){
              //  alert(data);
            // }
            // else{
          
            //   data=JSON.parse(data);
            //       // console.log(data);
            //       window.location.href='order_place.php?Price='+data.Price+'&&ID='+data.OrderID;
            // }
          }
        });




  });
 })
</script>
<body>
  <section id="emp_panel">
    <div class="container">
   <br>
    <button class="float-right btn btn-sm btn-danger ml-2" onclick="location.href='scripts/logout.php'">Logout</button>
    <button class="float-right btn btn-sm btn-primary"  onclick="location.href='index.php'"  >Main Page</button>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <div class="card w-75" style="margin-left: 12%">
      <h4 class="card-title text-center m-3">Edit Profile</h4>
      <div class="card-body px-5">
        <form>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  placeholder="Enter Name" value="<?php 
           echo  $_SESSION["Name"]
            ?>">
          </div>
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter E-mail" readonly value="<?php 
          echo  $_SESSION["EmailId"]
            ?>">
          </div>
          <div class="form-group">
            <label for="InputMobile1">Mobile </label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No." readonly value="<?php 
          echo  $_SESSION["Mobile"];
            ?>">
          </div>
          <div class="form-group">
            <label for="Textarea1">Address</label>
            <textarea class="form-control" id="Textarea1" rows="3"  value="" id="textarea1"><?php 
          echo  $_SESSION["Address"];
            ?></textarea>
          </div>
          <div class="form-group">
            <label for="Pin">Pin Code</label>
            <input type="text" class="form-control" id="pin" placeholder="Pin Code"  value="<?php 
          echo  $_SESSION["Pin"];
            ?>">
          </div>    
          <button type="button" id="updateButton" class="btn btn-primary">Save</button>
          <br><br>
         
        </form>
      </div>
    </div>
  </div>
</section>

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());

  </script>
</body>
</html>