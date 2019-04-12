<?php
$servername = "localhost";
$username = "root";
$password = "root@123";
$dbname="orphanage";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$db =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql="SELECT admin_id,admin_password,admin_name from orphanage.admin where admin_id = 'Monil20' and admin_password = 'admin@123'";
$result = $conn ->query($sql) or die($conn->error);
$rows=$result->num_rows;
$row = $result->fetch_assoc();
if ($result->num_rows== 1) {
$_SESSION['login_user']= $row["admin_name"];// Initializing Session
header("Location:/Project/def.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
//session_destroy();
header("Location:/Project/abc.php");
}


?>