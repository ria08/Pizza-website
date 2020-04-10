<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- <script src="sweetalert2/dist/sweetalert2.all.min.js"></script> -->

<!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script> -->
<!--  -->

<style type="text/css">
  .speech-bubble {
  position: relative;
  background: #e9eced;
  border-radius: .6em;
      width: 50%;
  padding: 5px;
      margin: 5px;
    margin-bottom: 15px;
}
  .speech-bubble-answer {
  position: left;
  background: #536266;
  border-radius: .4em;
  padding: 5px;
      margin-left: 50%;
    margin-bottom: 15px;

}

/*.speech-bubble:after {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  width: 0;
  height: 0;
  border: 18px solid transparent;
  border-right-color: #e9eced;
  border-left: 0;
  border-bottom: 0;
  margin-top: 9px;
  margin-left: 18px;
  pa
  padding-top: 100px;
  padding-bottom: : 100px;

}*/
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

  var SID="123213";
  <?php
  // include("scripts/utilities.php");
  if(isset($_SESSION["Role"]) && $_SESSION["Role"]=="Customer" ){
    $x=$_SESSION["EmailId"];

echo "SID='$x';";
// echo $x;
  }else{
    // echo $_SESSION["Role"];
  echo "SID='NotLoggedIn';";
  
  }
  

?>

function get_Question(){
   $.ajax({
                 type: 'GET',
                contentType: 'application/json;charset=UTF-8',
                url: 'http://127.0.0.1:5000/api/'+SID+'/getQuestions',

                success: function (e) {
                    e=JSON.parse(e);
                    if(e['done']!=undefined){

                    e=JSON.stringify(e);
                      $.ajax(
                        {url:"scripts/chatbot.php",
                        type:"POST",
                        data:"Object="+e,
                        success:function(da){
                          window.location.href = "user_details.php";
                        }

                      }
                        );
                    }else{
                    $('#chat-area').append('<div class="speech-bubble">'+e['Question'][0]+'</dib>');
                    $('#answers').html("");
                      if(e['Ing']!=undefined){

  e['Answers'].forEach(x=>$('#answers').append('<input type="checkbox" id="'+x+'" >'+x+'</input>'));
  $('#submitChat').prop("hidden",false);
                      }else{

                    e['Answers'].forEach(x=>$('#answers').append('<button type="button" onclick="setAnswer(\''+x+'\')">'+x+'</button>'));
                  }
                  }
                },
                error: function(error) {
            }
            });


  }      
      $(document).ready( function() {
        // if(SID!="NotLoggedIn")
        get_Question();
      
  });
  
  function setAnswer(answer){
     $.ajax({
                 type: 'GET',
                contentType: 'application/json;charset=UTF-8',
                url: 'http://127.0.0.1:5000/apiA/'+SID+'/'+answer,
                async:false,
                success: function (e) {
                    $('#chat-area').append('<div class="speech-bubble-answer">'+e+'</div>');

                        $("#chat-area").animate({ scrollTop: 20000000 }, "slow");
                  get_Question();
                },
                error: function(error) {
            }
            });


  }
function doSomething(){
  setAnswer(get_all_checkbox());
  $('#submitChat').prop("hidden",true);


}
function get_all_checkbox(){
  let d=[];

       $('input:checked').each(function(){
        d.push($(this).attr("id"));});
       return(d.join(','));

// });
}

</script>
<section id="chat">
  <button style="background-color: #555;
                border-radius: 50%;
                color: white;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                position: fixed;
                bottom: 23px;
                right: 28px;"
                onclick="openForm()"><img src="Image/chat2.ico" width="60px"></button>

<div  style="display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
            border-radius: 10px;" id="myForm">

  <form action="" class="form-container" style="height: 470px;
                                                width: 450px;
                                                max-width: 450px;
                                                padding: 10px;
                                                background-color: white;">
    <div class="row">
      <div class="col-md-11">
        <h4 class="text-center">How may I help you?</h4>
      </div>
      <div class="col-md-1">
        <button type="button" class="close float-right" onclick="closeForm()"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
    <hr>
      <div class="row">
        <div id="chat-area" class="p-2 my-2 mx-4 border " style="width: 440px; height: 270px; overflow-x: auto;">

        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
            <div id="answers">

                        </div>
         <!--  <div style="width: 100%;
                      padding: 15px;
                      margin: 5px 0 22px 0;
                      border: none;
                      background: #f1f1f1;
                      resize: none;
                      " placeholder="Type message.." name="msg" required>
                      <div id="answers">

                        </div>
                      

                      </div>     -->
        </div>
        <div class="col-sm-2" style="margin-left: -10px; margin-top: 45px;">
          <button type="button" id="submitChat" class="btn btn-primary" onclick="doSomething()" hidden>"Send</button>
        </div>
      </div>
    
      

    </div>
    
 
  </form>
</div>
</section>


 <footer id="main-footer" class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-6 ml-auto">
          <p class="lead">
            Copyright &copy;<span id="year"></span>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());
    function openForm() {
      if(SID=="NotLoggedIn"){
          Swal.fire({ position: 'center',  type: 'warning', title: 'Please Log In to use the chatbot..', showConfirmButton: false,timer: 2000 });
      }else
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
</body>
</html>