<?php
session_start();
$content=$_GET["content"];
$servername = "127.0.0.1"; 
$username = "root";
$password = "cornhack2019";
$gname =$_SESSION["gname"];
/*
post_id INT NOT NULL,
	person_id INT NOT NULL,
	photo_id INT,
	video_id INT,
	gathering_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	votes INT,
	content VARCHAR(255),
    primary key(post_id),
    foreign key(person_id) References Person(Person_ID),
    foreign key(photo_id) References photo(photo_id),
    foreign key(video_id) References video(video_id),
    foreign key(gathering_id) References gathering(gathering_id)
*/
try {
    $conn = new PDO("mysql:host=$servername;dbname=cornhack2019", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("INSERT INTO post(person_id,gathering_id,content)VALUES(1,1,:content)");
	//$stmt->bindParam(':gathering_id',$gname);
	$stmt->bindParam(':content',$content);
	$stmt->execute();
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	$conn=null;
?>
<head>
<script>
window.onload = function redirect(){window.location.href="class_Page/class_Page.php";}
</script>
</head>