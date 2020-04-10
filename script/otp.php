<?php
include('layouts/panel_top.php');
isCustomerLoggedIn();

?>

<script type="text/javascript">
  let currentOTP=0;

  function up(t) {
    $("#otpTime").html("OTP is vaild for  "+t+" Seconds");
  };
  function timer(seconds){
      var remaningTime = seconds;
      window.setTimeout(function() {
        // console.log(seconds);
        up(seconds);
        // console.log(remaningTime);
        if (remaningTime > 0) {
          timer(remaningTime - 1); 
        }
        else{
          //otp expired
           Swal.fire({ position: 'center',  type: 'error', title: 'OTP Expired!', showConfirmButton: false,timer: 1500 });
           currentOTP="asdddddddddddddddddddddddddddddddddddddddddd";
            $( "#otpResend" ).prop( "disabled", false );
          //  window.location.reload();
        }
      }, 1000);
    }
  $(document).ready(function(){
    sen();
    $("#otpResend").click(function(e){
      sen();
  });

  $("#otpSubtmit").click(function(e){
    let enteredOTP=$("#otpInput").val().trim();
    if(currentOTP==0){
      return;
    }
    if(enteredOTP==currentOTP){
        Swal.fire({ position: 'center',  type: 'success', title: 'OTP Verified!', showConfirmButton: false,timer: 2000 });
        $.ajax({
          url:'scripts/make_order.php',
          type:'GET',
          success:function(data){
            if(data=="No Item in Cart"){
               alert(data);
            }
            else{
            //  console.log(data);
              data=JSON.parse(data);
                  // console.log(data);
                  // console.log('order_place.php?Price='+data.Price+'&&ID='+data.OrderID);
                  window.location.href='order_place.php?Price='+data.Price+'&&ID='+data.OrderID;
            }
          }
        });
      }
      else{
        Swal.fire({ position: 'center',  type: 'error', title: 'Invalid OTP!', showConfirmButton: false,timer: 2000 });
      }
    });
  });
function sen(){
    $.ajax({
      type: "POST",
      url: "scripts/sendOTP.php",
      data: " ",
      cache: false,
      success: function(r){
        console.log(r);
        Swal.fire({ position: 'center',  type: 'success', title: 'OTP Sent!', showConfirmButton: false,timer: 2000 });
        currentOTP=r;
        $( "#otpResend" ).prop( "disabled", true );
        timer(180);
      }
   });
}
</script>
<body>
  <section id="emp_panel">
    <div class="container">
    <br>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <br>
    <div class="card ">
      <h5 class="card-title text-center m-3">OTP Verification</h5>
      <div class="card-body text-center">
        <p class="lead text-center" id="message"> OTP has been sent to your E-mail:<?=$_SESSION["EmailId"];?></p>
          <div class="form-group  col-sm-4" style="margin-left: 34%;">
            <input type="text" class="form-control" id="otpInput" placeholder="Enter OTP">
            <small  class="form-text text-muted text-center">Never share your OTP with anyone.</small>
          </div>
          <button type="button"  id="otpSubtmit" class="btn btn-primary">Submit</button>
          <br><br>
          <button  id="otpResend" class="btn btn-sm" style="background-color: transparent; color: blue;">Resend OTP</button>
          <small class="form-text text-muted text-center" id="otpTime"></small>
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