<?php
$user =$_POST["username"];
$pass =$_POST["password"];
//$servername = "localhost";
$servername = "127.0.0.1"; 
$username = "root";
$password = "cornhack2019";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "SELECT Person_ID,pass FROM Person WHERE handle =".$user.";";
$result = $conn->query($sql);
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc()){
		if($row["pass"]==$pass) $_SESSION["User"]=$user;
	}
}
header('Location: ../index/semesterSurfer.php');
?>