<?php
session_start(); // Starting Session
$error2=''; // Variable To Store Error Message
$error1=''; // Variable To Store Error Message
$error=''; // Variable To Store Error Message
$error=''; // Variable To Store Error Message // Variable To Store Error Message
 if (isset($_POST["btn_login"])){
		// Define $username and $password
		$username=$_POST['email'];
		$password=$_POST['password'];

		echo "Name".$username;
		echo "Password".$password;

		$servername = "localhost11";
        $username = "root";
        $password = "root@123";
		$dbname = "orphanage";
		          // Create connection
				// $conn = new mysqli($servername, $username, $password, $dbname);
		$conn =new mysqli($servername, $username, $password, $dbname);
		//$db=new mysqli_connect($servername, $username, $password, $dbname);
						//$conn = new mysqli("localhost","monil","admin@123","orphanage");
						//$username = stripslashes($username);
						//$password = stripslashes($password);
		$username=$_POST['email'];
		$password=$_POST['password'];

		$sql="SELECT admin_id,admin_password,admin_name from orphanage.admin where admin_id = '$username' and admin_password = '$password'";
		$result = $conn ->query($sql);
		$row=$result->fetch_assoc();

		$sql1="SELECT user_id,user_password,user_name from orphanage.user where user_id = '$username' and user_password = '$password'";
		$result1 = $conn ->query($sql1);
		$row1= $result1->fetch_assoc();

		if ($result->num_rows>= 1) {
				$_SESSION['login_user']=$row["admin_name"];// Initializing Session
				header("Location:/Project/index.php"); // Redirecting To Other Page
		} 
		else if($result1->num_rows>=1){
			$_SESSION['login_user']=$row1["user_name"];// Initializing Session
			//echo "BYE".$_SESSION['login_user'];
			header("Location:/Project/index.php"); // Redirecting To Other Page
		}
		else if($result->num_rows==0 || $result1->num_rows==0) {
				$error = "Username or Password is invalid";
				session_destroy();
				header("Location:/Project/login.php");
			}

	$conn->close();
	}
?>