<!DOCTYPE html>
<html>
  <head>
    <!--อันดับแรกคือต้องมี jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <style media="screen">
      html,body{
        height:100%;
        padding:0;
        margin:0;
      }fieldset {
        padding: 1em;
        font:80%/1 sans-serif;
        width: 400px;
        margin: 100px auto;
        padding-top: 25px;
      }label {
        color: #777B81;
        float:left;
        width:25%;
        margin-right:0.5em;
        padding-top:0.5em;
        text-align:right;
        font-weight:bold;
      }.fer{
        text-align:center;
        margin-top: 10px;
      }.txt{
        font:140%/1 sans-serif;
        font-weight:bold;
        color: #777B81;
      }.sp{
        font-weight: bold;
        color: red;
      }
    </style>
    <script>


function phonenumber(inputtxt){
  var phoneno =/^\d{10}$/;
  return phoneno.test(inputtxt);
}


// <!--funcTion checkEmail-->
  function checkemail(str){
  var emailFilter=/^.+@.+\..{2,3}$/;
  if (!(emailFilter.test(str))){
    return false;
    }
    return true;
}


// <!-- Function input data & onclick-->
    $(document).ready(function() {
      $('#send').click(function(){
        var name = $('#name').val()
        var email = $('#email').val()
        var tel = $('#tel').val()
        var company = $('#company').val()

//Check Form null

        if (name != null && name != undefined && name !="" && email !="" && tel !="" && company !="") {

        }

        else {
          alert("กรุณากรอกข้อมูลให้ครบถ้วน");
          return false
        }

        if (!checkemail(email)) {
           alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
          return false
        }
// <!--console.log(phonenumber(tel));-->
        if (!phonenumber(tel)) {
          alert("มึงใส่เบอร์ผิดแสส"); 
          return false

        }

        $.post( "config/postData.php",{ name: name, email: email, tel: tel, company: company }, function(data) {
          console.log(data);
          $('#id').html(data.id)
          $('#pass').html(data.pass)
          $( "#dialog" ).dialog( "open" );
        }, "json");


      })
    });

    </script>
    <title>Login Guest Wifi</title>
  </head>
  <body>
    <form>
      <fieldset>
      <legend class="txt"> Sign in Guest Wifi </legend>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"/><span class="sp"> *</span>
        <br />    <br />
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" /><span class="sp"> *</span>
        <br />    <br />
        <label for="tel">Tel:</label>
        <input type="text" name="tel" id="tel" size="15" /><span class="sp"> *</span>
        <br />    <br />
        <label for="company">Company:</label>
        <input type="text" name="company" id="company" size="20" /><span class="sp"> *</span>
        <br />    <br />
        <div class="fer">
          <input class="txt" type="button" name="send" id="send" value="Generate"/>
          <input class="txt" type="reset" name="reset" id="reset" value="Cancle" />
        </div>
      </fieldset>
    </form>

<!--Dialog Show ID & PASS-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#dialog" ).dialog({
        autoOpen: false,
        modal: true
      });
      // $( "#send" ).on( "click", function() {
      //
      // });
    } );
    </script>
  <div class="txt" id="dialog" title="Username & Password">
    <p></p>ID: <span id="id"></span> <p>
     Pass: <span id="pass"></span>
  </div>


  </body>
</html>
