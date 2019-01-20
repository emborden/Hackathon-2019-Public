<?php session_start();?>
<!DOCTYPE html>

<html>

  <head>
    <link rel="stylesheet" type="text/css" href="hack.css">
  </head>

<body style="background-color:azure;">
 <form action="../transition.php" method="get">
   <div class="boxed blueinline " align="center">
     <p>
       <p style="text-align:left;"><font face="arial">Add Picture(Optional)</font><button class="post" type="button">Browse</button><br>
         <p style="text-align:left;"><font face="arial">Add Video(Optional)</font><button class="post" type="button">Browse</button><br>
 <p style="text-align:left;"><font face="arial">Your Post Here:</font><br>
   <p style="text-align:left;"><textarea placeholder="Descrption" rows="10" cols="100" name="content"></textarea><br>
     <input type="submit" value="Submit">
 </p>
   </div>   </form>
</body>
</html>
