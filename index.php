<?php
include('session.php');
?>
<!doctype html>

<html lang="en">


  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Attendance Recording & Monitoring System (ARMS)</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn" >
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <a class="mdl-navigation__link" href="logout.php"><li class="mdl-menu__item">LogOut</li></a>
            <a class="mdl-navigation__link" href="about.php"><li class="mdl-menu__item">About</li></a>
            <a class="mdl-navigation__link" href="contact.php"><li class="mdl-menu__item">Contact</li></a>
          </ul>
        </div>
      
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/sbmp.jpg" class="demo-avatar">
        
        <?php
              echo "$login_session"; 
              ?>


        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href="homepage.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">face</i>Monitor Attendance</a>
          <a class="mdl-navigation__link" href="modiattend.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Modify Attendance</a>
          <a class="mdl-navigation__link" href="addstudent.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Add Student</a>
          <a class="mdl-navigation__link" href="defaulter.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>Check Defaulter</a>
          <a class="mdl-navigation__link" href="addsubject.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Add Subject</a>
          <a class="mdl-navigation__link" href="subjectregister.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Subject Registration</a>
    			<a class="mdl-navigation__link" href="newteacher.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Add Teacher</a> 
          
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
              
        <?php
          error_reporting(0);
          $servername = "localhost";
          $username = "root";
          $password = "root@123";
          $dbname = "orphanage";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection fAailed: " . $conn->connect_error);
          } 
                     	/*date_default_timezone_set('Asia/Kolkata');
                			$t=date('h:i:s A');
                			$x=getdate();
                			$n=$x[weekday];
                    	  $sql="SELECT sub_code ,CAST(Stime AS TIME) AS Stime ,CAST(Etime AS TIME) AS Etime from timetable where Stime < '$t' and Etime > '$t'  and Tday='$n'";
                      	echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp'>",
                       	"<tr><th>Subject Code</th><th>teacher ID</th><th>Teacher Name</th></tr>";
                			$result = $conn->query($sql);
                      if ($result->num_rows > 0)
                      {
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                        	$Subcode=$row["sub_code"];
                        	$sqlteach = "SELECT teacher_id from subject where sub_code = '$Subcode'";              
                            $result1 = $conn->query($sqlteach);
                            $row=$result1->fetch_assoc();
                            $teacherid=$row["teacher_id"];
                            $sqlteach = "SELECT teach_name from teacher where teach_id = '$teacherid'";
                            $result2 = $conn->query($sqlteach);
                          	$row2 = $result2->fetch_assoc();
                            $teachername = $row2["teach_name"];
                            echo "<tr>". "<td>" ."" .$Subcode."</td><td>". $teacherid."</td><td>". $teachername."</td></tr>";
                        }
                     }
                    else
                          {
                            echo "No rows";
                          }*/ 

          $sql="SELECT user_id,user_name,user_phone_no from user";
          $result=$conn->query($sql);
          echo "<table class='mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp'>",
                        "<tr><th>User Id</th><th>User name</th><th>User Phone Number</th></tr>";
          if($result->num_rows>0)
          {
            while ($row=$result->fetch_assoc()) {
              # code...
              echo "<tr>"."<td>"."".$row["user_id"]."</td><td>".$row["user_name"]."</td><td>".$row["user_phone_no"]."</td>";
              echo "</tr>";
            }
          }
          else{
            echo "No rows TO display";
          }
        ?>

      </main>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3   "/>
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125   "/>
            </g>
          </g>
        </defs>
      </svg>
      <a href="logout.php" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Logout</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>

</html>
