<!DOCTYPE html>
<html>
  <head>
  <!--อันดับแรกคือต้องมี jquery-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- //Overwrite CSS -->
  <link rel="stylesheet" href="style.css" />
  
    <style media="screen">
      html,body{
        height:100%;
        padding-right: 0;  
        margin:0 auto;
      }fieldset {
        padding: 1em;
        font:80%/1 sans-serif;
        width: 400px;
        margin: 100px auto;
        padding-top: 25px;
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

  // Process Function
      //function check tel
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
      // <!-- Function Generate Username & Password-->
          $(document).ready(function() {
          $('#generate').click(function(){
          var name = $('#name').val()
          var email = $('#email').val()
          var tel = $('#tel').val()
          var company = $('#company').val()

// Process Checking data input Generate username & password
        //Check Form null
                if (name != null && name != undefined && name !="" && email !="" && tel !="" && company !="") {

                }
                else {
                  alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                  return false
                }
        // console.log(checkemail(email));
                if (!checkemail(email)) {
                  alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
                  return false
                }
        // console.log(phonenumber(tel));
                if (!phonenumber(tel)) {
                  alert("ท่านใส่เบอร์โทรไม่ถูกต้อง"); 
                  return false
                }
                $.post( "config/postData.php",{ name: name, email: email, tel: tel, company: company }, function(data) {
                  console.log(data);
                  $('#id').html(data.id)
                  $('#pass').html(data.pass)
                  $( "#dialog" ).removeClass('hide');
                }, "json");
              })
            });

// <!-- Function Sign in-->
          $(document).ready(function() {
          $('#send').click(function(){
          var name = $('#name').val()
          var email = $('#email').val()
          var tel = $('#tel').val()
          var company = $('#company').val()

    // Process Checking data input 
        //Check Form null
                if (name != null && name != undefined && name !="" && email !="" && tel !="" && company !="") {

                }
                else {
                  alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                  return false
                }
        // console.log(checkemail(email));
                if (!checkemail(email)) {
                  alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
                  return false
                }
        // console.log(phonenumber(tel));
                if (!phonenumber(tel)) {
                  alert("ท่านใส่เบอร์โทรไม่ถูกต้อง"); 
                  return false
                }
                $.post( "config/postDataSignIn.php",{ name: name, email: email, tel: tel, company: company }, function(data) {
                  console.log(data);
                  $('#name').html(data.name)
                  $( "#dialog" ).removeClass('hide');
                }, "json");
              })
            });


      </script>
    <title>Meeting</title>
  </head>
 
  <body>
    <p><a href="visit-for.html"><img src="img/left-arrow.png" class="icon"></a></p>
      <div  class="logo">
          <img src="img/kdLogo.png">
      </div>

      <!-- Form input Data -->
      <div style="text-align:center" >
      <form class="form-horizontal" ;>
        <div class="form-group" >
          <label for="inputName" class="col-xs-6 col-sm-4 control-label">Name:</label>
          <div class="col-xs-6 col-sm-4">
            <input type="text" class="form-control" id="name" placeholder="Name *">
          </div>
        </div>
        <div class="form-group" >
          <label for="inputEmail" class="col-xs-6 col-sm-4 control-label">Email:</label>
          <div class="col-xs-6 col-sm-4">
            <input type="text" class="form-control" id="email" placeholder="Email *">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTelNum" class="col-xs-6 col-sm-4 control-label">Tel:</label>
          <div class="col-xs-6 col-sm-4">
            <input type="text" class="form-control" id="tel" placeholder="08xxxxxxxx *">
          </div>
        </div>
          <div class="form-group" >
          <label for="inputCompany" class="col-xs-6 col-sm-4 control-label">Company:</label>
          <div class="col-xs-6 col-sm-4">
            <input type="text" class="form-control" id="company" placeholder="Your company name *">
          </div>
        </div>
        <?php if(isset($_GET['ref']) && $_GET['ref'] == "delivery"){ ?>
        <div class="form-group" style="text-align:center">
            <button type="button" id="send" name="send" class="btn btn-primary btn-lg">Sign in</button>
            <button type="reset" id="reset" class="btn btn-primary btn-lg">Cancel</button>
        </div>
        <?php }else { ?>
        <div class="form-group" style="text-align:center">
            <button type="button" id="send" name="send" class="btn btn-primary btn-lg">Sign in</button>
            <button type="button" id="generate" name="generate" class="btn btn-primary btn-lg">Create wifi account</button>
            <button type="reset" id="reset" class="btn btn-primary btn-lg">Cancel</button>
        </div>
        <?php } ?>
      </form>

     <!-- <form>
      <fieldset>
      <legend class="txt"> Sign in Guest Wifi </legend>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"/><span class="sp"> *</span>
        <br />    <br />
        <label for="email">E-mail:</label>
        <input type="email" placeholder="xxx@xxx.com" name="email" id="email" /><span class="sp"> *</span>
        <br />    <br />
        <label for="tel">Tel:</label>
        <input type="text" placeholder="08xxxxxxxx" name="tel" id="tel" size="15" /><span class="sp" > *</span>
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
    </div>  -->

      <!-- Dialog username$password -->
      <div class="box-dialog hide" id="dialog">
        <div class="dialog" title="Username & Password">
            <p>ID: <span class="ui-widget" id="id"></span></p>
            <p>Pass: <span class="ui-widget" id="pass"></span></p><br>
            <p><a href="/guestwifi/">Back</a></p>
            <p><button type="reset" class="hide" value="ออก"></button></p>
        </div>
      </div>

      <div class="box-dialog hide" id="dialog1">
        <div class="dialog1" title="คุณลงทะเบียนเรียบร้อย">
            <p>Name: <span class="ui-widget" id="name"></span></p>
            <p><a href="/guestwifi/">Back</a></p>
            <p><button type="reset" class="hide" value="ออก"></button></p>
        </div>
      </div>

  </body>
</html>
