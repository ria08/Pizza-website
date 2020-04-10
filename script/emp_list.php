<?php
include('layouts/panel_top.php');
// include('scripts/utilities.php'); 
if(!isset($_SESSION['Role']) or $_SESSION['Role']!='Admin'){
  header("Location: admin_log.php");
}
?>
<script type="text/javascript">
  $('document').ready(
  function(){
$.ajax({
    url:"scripts/get_emp.php",
    type:"GET",
    success:function(data){
      // console.log(data);
      var data=JSON.parse(data);
      console.log(data);
      var a=1;
      data.forEach(x=>{$('#asd').append('<tr><td>'+(a++)+'</td><td>'+x.Name+'</td><td>'+x.ID+'</td><td><button class="btn btn-danger" onclick="delete_emp(\''+x.ID+'\')">Delete</button></td></tr>')});

    }



});


    
  });

  function delete_emp(id){
    $.ajax({
    url:"scripts/delete_emp.php",
    type:"POST",
    data:"ID="+id,
    success:function(data){
   console.log(data);

    $('#result').append(data);
    setTimeout(location.reload(),1000);

    }



});


  }

</script>

<body>
  <div id="result">
  </div>
  <section id="list">
    <div class="container">
    <?php
      include('layouts/panel_heading.php')
      ?>
    <h4 class="text-center text-primary">Employee List</h4>
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Employee ID</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="asd">
        
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

 
</body>
</html>