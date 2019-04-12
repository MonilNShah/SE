<?php
session_start();
$conn = new mysqli("localhost","root","root@123","orphanage");
$user_check = $_SESSION['login_user'];

$sql="select * from orphanage.admin where admin_name='$user_check'";
$result = $conn ->query($sql);
$row = $result ->fetch_assoc();

$sql1="select * from orphanage.user where user_name='$user_check'";
$result1 = $conn ->query($sql1);
$row1 = $result1 ->fetch_assoc();

if ($result->num_rows>= 1) {
	$login_session =$row['admin_name'];
}

else if ($result1->num_rows>= 1) {
	$login_session =$row1['user_name'];
}

if(!isset($login_session)){
	$conn->close();
	session_destroy();
	header('Location:/Project/login.php'); // Redirecting To Home Page
}
?>