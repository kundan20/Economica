<?php

include 'dbconnect.php';


  if( isset($_POST['signup_mob_number']) && isset($_POST['signup_email']) && isset($_POST['signup_password']))
  {
    $signup_mob_number=$_POST['signup_mob_number'];
        $signup_email=$_POST['signup_email'];
        $signup_password=$_POST['signup_password'];
    $pass_hash=md5($signup_password);
    include 'dbconnect.php';
   // $confirm_password=$_POST['confirm_password'];
    if(!empty($signup_mob_number) && !empty($signup_email) && !empty($signup_password))
    {

      
     /* if($password!=$confirm_password)
      {
        echo 'Password don\'t match.';
      }
      else
      {*/

      $query="SELECT `signup_email` FROM `signup` WHERE `signup_email`='$signup_email'";

                $query_run=mysqli_query($con_ser,$query);
                if(mysqli_num_rows($query_run)==1)

                {

                  //echo 'The E-mail id  <strong>'.$signup_email.'</strong> is already exists'; 
                 ?>
                    
                  
                  <script >
                    alert('The E-mail id  is already exists');
                  </script>
<?php
                }
                else
                {
                  $query="INSERT INTO `signup` VALUES ('','".mysqli_real_escape_string($con_ser,$signup_mob_number)."','".mysqli_real_escape_string($con_ser,$signup_email)."','".mysqli_real_escape_string($con_ser,$pass_hash)."')";
                 echo $query;
                  if($query_run=mysqli_query($con_ser,$query))
                  {echo $query_run;
                    ?>
                    
                  
                  <script >
                    alert('You have Successfully registered,now you can log in.');
                  </script>
<?php
                   /* <a href="index.php">Log In </a>*/

                  }
                  else
                  {
                    //echo 'Sorry,Roll Number '.$signup_roll_number.' is already exits!';
                               ?>
                    
                  
                  <script >
                    alert("Sorry,Mobile Number is already exits! ",$signup_mob_number);
                  </script>
<?php
      
                  }

                }
          }  

    
    else
    {
      //echo 'Please fill in all fields!';
     ?>
                    
                  
                  <script >
                    alert('Please fill in all fields!');
                  </script>
<?php
    }
  }


 if(isset($_POST['login_mob_number']) && isset($_POST['login_password']))

{
 
  $login_mob_number=$_POST['login_mob_number'];
    $login_password=$_POST['login_password'];

  $pass_hash=md5($login_password);
  if( !empty($login_mob_number) && !empty($login_password))
  {
    $query="SELECT `id` FROM `signup` WHERE `signup_mob_number`='".mysqli_real_escape_string($con_ser,$login_mob_number)."' AND `signup_password`='".mysqli_real_escape_string($con_ser,$pass_hash)."'";
     echo $query;
    if($query_run=mysqli_query($con_ser,$query))
    {
       $query_num_rows=mysqli_num_rows($query_run);
      if($query_num_rows==0)
      {
        //echo 'Invalid  Roll number or password';
           ?>
                    
                  
                  <script >
                    alert('Invalid  mobile number or password!');
                  </script>
<?php
      }
      else
        {
          
          while($row=mysqli_fetch_assoc($query_run))
          {
             $user_id=$row['id'];
            $_SESSION['user_id']=$user_id;
           header('Location:home.php');
          

          }

        }
    }
    

  }
  else
  {
    //echo 'Enter Roll Number and Password';
      ?>
                    
                  
                  <script >
                    alert('Enter Mobile Number and Password!');
                  </script>
<?php
  }
}

?>
<!doctype html>
<html>

<head>
  <style type="text/css">
   @import url(http://fonts.googleapis.com/css?family=Roboto:100);
.flat-form {
  background: #5D6D7E;
  color: white;
  margin: 40px auto;
  width: 400px;
  height: 550px;
  position: relative;
  font-family: 'Roboto';
  border-radius: 25px 25px 25px 25px;



}

.flat-form .tabs {
  display: block;
  background: #5D6D7E;
  width: 100%;
  height: 40px;
  margin: 0;
  margin-bottom: 20px;
  padding: 0;
  position: relative;
  list-style-type: none;
}
.flat-form .tabs li {
  display: block;
  margin: 0;
  padding: 0;
  float: left;
}
.flat-form .tabs li a {
  display: block;
  background: #5D6D7E;
  color: white;
  text-decoration: black;
  font-size: 16px;
  float: left;
  padding: 12px 22px;
}
.flat-form .tabs li a.active {
  background: #85929E  ;
  border-right: none;
  -moz-transition: all 0.5s linear;
  -o-transition: all 0.5s linear;
  -webkit-transition: all 0.5s linear;
  transition: all 0.5s linear;
}
.flat-form .tabs li a:hover {
  background: #d65548;
  -moz-transition: all 0.5s linear;
  -o-transition: all 0.5s linear;
  -webkit-transition: all 0.5s linear;
  transition: all 0.5s linear;
}
.flat-form .tabs li:last-child a {
  text-align: center;
  width: 174px;
  padding-left: 0;
  padding-right: 0;
  border-right: none;
}
.flat-form .form-action {
  padding: 0 20px;
  position: relative;
}
.flat-form h1 {
  font-size: 42px;
  padding-bottom: 10px;
}
.flat-form form {
  padding-right: 80px !important;
}
.flat-form form input[type=text], .flat-form form input[type=number] .flat-form form input[type=submit] {
  font-family: 'Roboto';
}
.flat-form form input[type=text], .flat-form form input[type=number],.flat-form form input[type=password] {
  width: 100%;
  height: 40px;
  margin-bottom: 10px;
  padding-left: 15px;
  background: #fff;
  border: none;
  color: black;
  outline: none;

}
.flat-form form input.button {
  border: none;
  display: block;
  background: #136899;
  height: 40px;
  width: 80px;
  color: #ffffff;
  text-align: center;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: 0px 3px 1px #2075aa;
  -webkit-box-shadow: 0px 3px 1px #2075aa;
  box-shadow: 0px 3px 1px #2075aa;
  -moz-transition: all 0.15s linear;
  -o-transition: all 0.15s linear;
  -webkit-transition: all 0.15s linear;
  transition: all 0.15s linear;
}
.flat-form form input.button:hover {
  background: #1e75aa;
  -moz-box-shadow: 0 3px 1px #237bb2;
  -webkit-box-shadow: 0 3px 1px #237bb2;
  box-shadow: 0 3px 1px #237bb2;
}
.flat-form form input.button:active {
  background: #136899;
  @include box-shadow( 0 3px 1px #0f608c );
}
.flat-form form input::-webkit-input-placeholder {
  color:black;
  
}
.flat-form form input::-moz-placeholder {
  color: black;
}
.flat-form form input::-moz-placeholder {
  color: black;
}
.flat-form form input::-ms-input-placeholder {
  color: black;
}
.flat-form .show {
  display: black;
}
.flat-form .hide {
  display: none;
}
h2 {
    text-align: center;
    text-shadow:3px 2px purple;
     
}
h4 {
    text-align: center;
    text-shadow:3px 2px purple;
     
}

</style>
<!--body {
  background: #black;
}-->
<h2  class="hidden-xs"><font color="white">TAXATION WITHOUT REPRESENTATION IS TYRANNY.</font></h2>
<h4   class="visible-xs"><font color="white">TAXATION WITHOUT REPRESENTATION IS TYRANNY.</font></h4>
<title>Knockcamp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='//fonts.googleapis.com/css?family=Cutive' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="modernizr-config.json"></script>
<script src="grunt-config.json"></script>
  </head>
  
  <body background="background1-min.jpg">

<div class="flat-form"">
  <ul class="tabs">
    <li>
      <a href="#login" class="active">Login</a>
    </li>
    <li>
      <a href="#SignUp">Sign Up</a>
    </li>
  </ul>
  <div id="login" class="form-action show">
    <h1>Login</h1>
    <form action="loginform.php" method="post">
      <ul class="list-unstyled">
        <!--<?php  $current_filename; ?><li>
           <input  list ="login_college_name" name="login_college_name" class="form-control" type="text" placeholder="College Name" /><br>
          <datalist id="login_college_name">
    <option value="Thapar University"/>
    <option value="IIT Bombay"/>
    <option value="BITS PILANI"/>
    <option value="SRMS BAREILLY"/>
    <option value="St. Andrews College,Gorakhpur"></option>
</datalist>
        </li>-->
        <li>
          <input type="text" name="login_mob\_number" class="form-control" id="login_mob_number" placeholder="Username/Mobile No." /><br>
            <li/>
            <li>
          <input type="password" name="login_password" class="form-control" id="login_password" placeholder="Password" /><br>
        <li/>
          <input type="submit" name="submit" value="Login" class="button" />
        </li>
         
    
    <p> <a href="forgot_pwd.php" style="color:black;float: right;margin-right:  40px;margin-bottom: 40px;text-decoration: underline;">Forgot Password?</a></p>
    
 
  
      </ul>
    </form>
  </div>
  <!--/#login.form-action-->
  <div id="SignUp" class="form-action hide">
    <h1>Sign Up</h1>
    <form action="loginform.php" onsubmit="return validateForm();"  name="myForm" method ="POST">
        <ul class="list-unstyled">
        <!--<li>
          <input list ="signup_college_name" class="form-control"  name="signup_college_name" type="text" placeholder="College Name" value="<?php if(isset($signup_college_name)) {echo $signup_college_name; }?>" /><br>
          <datalist id="signup_college_name">
    <option value="Thapar University"/>
    <option value="IIT Bombay"/>
    <option value="BITS PILANI"/>
    <option value="SRMS BAREILLY"/>
</datalist>
        </li>-->
        <li>
          <input type="text" class="form-control" name="signup_mob_number" id="signup_mob_number" placeholder="Mobile No." value="<?php if(isset($signup_mob_number)) {echo $signup_mob_number; }?>"/><br>
        </li>
        <li>
          <input type="text" class="form-control"  name ="signup_email" id="signup_email" placeholder="E-mail" value="<?php if(isset($signup_email)) {echo $signup_email; } ?>"/><br>
        </li>
        <li>
          <input type="password" class="form-control" name="signup_password" maxlength="10" id="signup_password" placeholder="Password " /><br>
        </li>
        <li>
          <input type="password" class="form-control" name="signup_confirm_password" id="signup_confirm_password" placeholder="Confirm Password" /><br>
        </li>


        <script type="text/javascript">
          var password = document.getElementById("signup_password")
  , confirm_password = document.getElementById("signup_confirm_password");

function validatePassword(){
  if(signup_password.value != signup_confirm_password.value) {
    signup_confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    signup_confirm_password.setCustomValidity('');
  }
}

signup_password.onchange = validatePassword;
signup_confirm_password.onkeyup = validatePassword;
        </script>
        <li>
          <input type="submit" name="submit" value="SignUp" class="button" />
        </li>
      </ul>
    </form>
  </div>
</div>
<script type="text/javascript">
$('.tabs').on('click', 'li a', function(e){
  e.preventDefault();
  var $tab = $(this),
       href = $tab.attr('href');

   $('.active').removeClass('active');
   $tab.addClass('active');

   $('.show')
      .removeClass('show')
      .addClass('hide')
      .hide();
  
    $(href)
      .removeClass('hide')
      .addClass('show')
      .hide()
      .fadeIn(550);
});</script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["signup_email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>
</body>
</html>
