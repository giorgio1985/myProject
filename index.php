<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
//require './db_connector.php';
require './db_table_creator.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customs";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['username'], $_POST['email'],  $_POST['phone'], $_POST['password'])){
$_username = htmlspecialchars($_POST["username"]);
$_password = htmlspecialchars($_POST["password"]);
$_email = htmlspecialchars($_POST["email"]);
$_phone = (int)$_POST["phone"];
$_time= strtotime("now");
	echo '<h3>'.'mi e andata bene!!!<br>' .$_username.' '.$_password. ' '. $_email. ' '. $_phone.'</h3>';
	echo '<h3><br>fine della sofferenza</h3>';
	//  INSERIRE NELLA TABELLA 
	$sql= "INSERT INTO login (username, email, phone, password) VALUES ('$_username', '$_email', '$_phone', '$_password')"; 
if (mysqli_query($connect, $sql)) {
    echo "New record created successfully";
} else {
    echo  mysqli_error($connect);
}
}
mysqli_close($connect);
?>
</body>
</html>