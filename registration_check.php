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
              

