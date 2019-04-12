>
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

          <form class="col s12" method="post" id="registeruser">

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
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='input100' type='text' name='name' id='name' />
                <label for='name'>Enter your Name</label>
              </div>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="date" date ="yyyy-mm-dd" id="date" name="date">
            <label class="mdl-textfield__label" for="date">Date ...</label>
          </div>


            <div class='row'>
              <div class='input-field col s12'>
                <input class='input100' type='text' name='phone_no' id='phone_no' />
                <label for='phone_no'>Enter your Phone Number</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='input100' type='text' name='address' id='address' />
                <label for='address'>Enter your Address</label>
              </div>
            </div>



            <br />
            <center>
              <div class='row'>
                <!--<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo' id="search" name="search" formmethod="_GET">SignUp</button>-->
                <button type="submit" class="mdl-chip" name="search" id="search" formt="registeruser">
                <span class="mdl-chip__text">Submit</span>
              </button>
              </div>
            </center>
          </form>

        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
      
  </main>
  <?php
          error_reporting(0);
          $servername="localhost";
          $username="root";
          $password="root@123";
          $dbname="orphanage";
          // Create connection
          $conn=new mysqli($servername,$username,$password,$dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 
              $email=$_POST["email"];
              $password=$_POST["password"];
              $name=$_POST["name"];
              $dob=$_POST["dob"];
              $phone=$_POST["phone_no"];
              $address=$_POST["address"];
              $date1_sql = date('Y-m-d', $dob);
              $sql="INSERT INTO user values ('$email','$password','$name','$date1_sql','$phone','$address')";
              if ($result=$conn->query($sql) == TRUE) {
                  echo "New record created successfully";
                  header('Location:/Project/login.php');
              } else {
                   echo "Error: " . $sql . "<br>" . $conn->error;
              }
        $conn->close();
       ?>
              
          

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