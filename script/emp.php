<?php
include('layouts/panel_top.php');
if(!isset($_SESSION['Role']) or $_SESSION['Role']!="Employee"){
header("Location: error.php");

}
?>

<script type="text/javascript">
callMe();
function callMe(){
  $('document').ready(function(){
$.ajax({
  url:"scripts/get_orders.php",
  type:"Get",
  success:function(data){
    update(data);
  }
});
});
}

let x;
function update(data){
  data=JSON.parse(data);
      $('#tableData').html('');

  if(data['Pending']!=undefined && data['Pending']==0){
  	  $('#pendingOrder').html(data["Pending"]);
      $('#deliveredOrder').html(data["Delivered"]);
      $('#rejectedOrder').html(data["Rejected"]);

      $('#totalOrder').html(data["Total"]);

  }else{
      $('#tableData').html('');
        data.forEach(x=>{
    if(x["Email"]==undefined){
      $('#pendingOrder').html(x["Pending"]);
      $('#deliveredOrder').html(x["Delivered"]);
      $('#rejectedOrder').html(x["Rejected"]);
      $('#totalOrder').html(x["Total"]);
      x['OrderId'].forEach(y=>$('#tableData').append(`<tr id='`+y+`' >
        <td>`+y+`</td>
        <td id='itemName`+y+`'></td>
        <td id='ingredients`+y+`'></td>
        <td id='address`+y+`'></td>
        <td id='amount`+y+`'>1</td>
        <td>
  <div class="dropdown">
  <select class="dropdown-toggle" name="drop" onchange="ses('`+y+`')" id="option`+y+`" >
  <option value="Delivered" value="Pending" default>Pending</option>
  <option value="Delivered" value="Delivered">Delivered</option>
  <option value="Rejected" value="Rejected">Rejected</option>
  </select>
</div>
</td>
        </tr>`));
    }else{
      $('#itemName'+x['MasterOrder']).append('<li>'+x['Item Name']+'</li>');
      $('#ingredients'+x['MasterOrder']).append('<li>'+x['Ingredients']+'</li>');
      $('#address'+x['MasterOrder']).html('<li>'+x['Address']+'</li>');
      $('#amount'+x['MasterOrder']).html((parseInt($('#amount'+x['MasterOrder']).html())+parseInt(x['Amount'])*1.18).toFixed(2));
    }
  }
  );
}
}
function ses(id){
  var cu=$('#option'+id).val();
  $.ajax({
    url:'scripts/updateOrder.php',
    type:'POST',
    async:false,
    data:'ID='+id+'&&Value='+cu,
    success:function(data){
  setTimeout(callMe(),500);


    }


  });
}


</script>
<body>
  <section id="emp_panel">
    <div class="container">
    <?php
    include('layouts/panel_heading.php')
    ?>
    <div class="row">
      <div class="col m-1 border">
        <h1 class="display-4" id="pendingOrder">0</h1>
        <p class="lead">Pending Order</p>
      </div>
      <div class="col m-1 border">
        <h1 class="display-4" id="rejectedOrder">0</h1>
        <p class="lead">Rejected Order</p>
      </div>
      <div class="col m-1 border">
        <h1 class="display-4" id="deliveredOrder">0</h1>
        <p class="lead">Delivered Order</p>
      </div>
      <div class="col m-1 border">
        <h1 class="display-4" id="totalOrder">0</h1>
        <p class="lead">Total Order</p>
      </div>
    </div>
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Order Id</th>
          <th scope="col">Order</th>
          <th scope="col">Ingreidents</th>
          <th scope="col">Deliver to</th>
          <th scope="col">Amount</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody id="tableData">
       <!--  <tr>
          <td>OrderId</td>
          <td>Item Name</td>
          <td>Ingredients</td>
          <td>Deliver ADdress</td>
          <td><span>&#8377</span>Amount</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pending
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item " href="#">Delivered</a>
                <a class="dropdown-item " href="#">Rejected</a>
              </div>
            </div>
          </td>
        </tr> -->
   
      </tbody>
    </table>
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