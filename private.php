<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="./buttonClick.js"></script>

  <link rel="stylesheet" type="text/css" href="./form.css">
  <link rel="stylesheet" type="text/css" href="./buttons.css">
   <link rel="stylesheet" type="text/css" href="./video.css">
	<title>private</title>
</head>
<body>
<h4>private</h4>
<p>Hello world private!</p>
<?php
require './index.php';
require './db_connector.php';
require './db_table_creator.php';
//session_start();
echo "<br>";
echo "Username:" .$_SESSION["user"];
echo "<br>";
echo "Password: " .$_SESSION["pass"];	
echo "<br>";	
echo "Time to connection " .$_SESSION["time"];
echo "<br>";
?>
<hr>

<div class="random-video">
   <iframe width="630" height="315" align="middle" 
src="https://www.youtube.com/embed/UZy1oIjxx3w?controls=0">
     </iframe> 
</div>
<hr>
<!-- here download videos from db system.... -->
</body>
</html>

