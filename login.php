<?php
include('check_session.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{
header("Location:/Project/index.php");
}
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 350px;" src="arms1.gif" />
      <br>
      <br>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="check_session.php">

            <div class='row'>
              <div class='input-field col s12'>
                <input class='input100' type='text' name='email' id='email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='mdl-textfield__input' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
                        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                     </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="user_registration.php">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
      <?php
          error_reporting(0);
          $servername = "localhost";
          $username = "root";
          $password = "root@123 ";
          $dbname = "orphanage";

          // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
          //$db =  mysqli_connect($servername, $username, $password, $dbname);
          // Check connection
          echo "Connected";
          echo "EE".$conn;
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
              
       ?>
  </main>



  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


  <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/bootstrap/js/popper.js"></script>
  <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/daterangepicker/moment.min.js"></script>
  <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="login/js/main.js"></script>


</body>

</html>





<!--
<style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>-->