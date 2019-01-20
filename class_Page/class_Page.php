<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="hack.css">
</head>

<body style="background-color:white;">
 <div>
    <table style="float:right" width="1100">
      <tr>
        <td>
          <p style="text-align:center;"><b>
              <div class="boxed blue">
                <font size="10">POSTS</font>
            </b>
            <span style="float:right;"><a href="file:///C:/Users/Sifat%20Syed/Desktop/Hackathon2019/post.html?"><button class="green_button" type="button"><font size="5"><b>New Post</b></font></button></a></span>
          </div><br>
          <div class="boxed">
<?php
$servername = "127.0.0.1"; 
$username = "root";
$password = "cornhack2019";


try {
    $conn = new PDO("mysql:host=$servername;dbname=cornhack2019", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
	$stmt = $conn->prepare("SELECT gathering_id FROM Gathering WHERE gname=:gname");
	//$stmt->bindParam(':firstname', $firstname);
    //$stmt->bindParam(':lastname', $lastname);
    //$stmt->bindParam(':email', $email);
	$stmt->bindParam(':gname',$gname);
	$gname = $_GET["class"];
	$stmt->execute();
	$result = $stmt->fetch();
    //if($result["pass"]==$_POST["password"])$_SESSION["User"]=$handle;	
	/*
	SELECT Customers.CustomerName, Orders.OrderID
FROM Customers
LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID
ORDER BY Customers.CustomerName;
	*/
	$classid = $result["gathering_id"];
	$stmt = $conn->prepare("SELECT post.content,post.votes,post.created_at,post.video_id,post.photo_id,person.handle FROM post LEFT JOIN person ON post.person_ID=person.person_ID WHERE gathering_id=:classid ORDER BY created_at");
	$stmt->bindParam(':classid',$classid);
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<div><p>".$row["handle"]." ".$row["votes"]."</p>";
	$debianMan = $conn->prepare("SELECT location FROM Video WHERE video_id=:video_id");
	$debianMan ->bindParam('video_id',$row["post.video_id"]);
	$debianMan ->execute();
	while($wander = $debianMan->fetch(PDO::FETCH_ASSOC))
	{
  echo'<video width="320" height="240" controls><source src="'.$wander["location"].'" type="video/mp4">Your browser does not support the video tag.</video>';
	}
	$debianMan = $conn->prepare("SELECT location FROM Photo WHERE photo_id=:photo_id");
	$debianMan->bindParam(":photo_id",$row["post.photo_id"]);
	$debianMan->execute();
	while($wander = $debianMan->fetch(PDO::FETCH_ASSOC))
	{
		echo ' <img src="'.$wander["location"].'" height="42" width="42"> ';
	}
	echo "<p>".$row["content"]."</p></div>";
		//$title = $row['title'];
		//$body = $row['body'];
	}
	
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>  
          </div>
          </p>
        </td>
      </tr>
    </table>
	</div>

  <table style="float:left" bgcolor="lightsteelblue" frame="box">
    <tr>
      <td>
        <div class="boxed blue">
          <font face="ink free" size="5"><b>CSCE 156</b></font>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <p><b>
            <div class="boxed blue">Filters:
          </b></div>
          <label class="container">Semester
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
          </label><br>

          <label class="container">Votes
            <input type="checkbox">
            <span class="checkmark"></span>
          </label><br>

          <label class="container">Professors' Notes
            <input type="checkbox">
            <span class="checkmark"></span>
          </label><br>

          <input type="submit" value="Submit">

        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p><b>
            <div class="boxed blue">Dates:</div>
          </b>
          <form>
            <input type="radio" name="year" value="current" checked>Current<br>
            <input type="radio" name="year" value="2018" checked> 2018<br>
            <input type="radio" name="year" value="2017" checked> 2017<br>
            <input type="radio" name="year" value="2016" checked> 2016<br>
            <input type="radio" name="year" value="2015" checked> 2015<br>
            <input type="radio" name="year" value="2014" checked> 2014<br>
            <input type="radio" name="year" value="2013" checked> 2013<br>
            <input type="radio" name="year" value="and many more" checked>..and many more<br>
          </form>
          <input type="submit" value="Submit">

        </p>
      </td>
    </tr>
  </table>
 