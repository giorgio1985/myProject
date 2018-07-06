<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
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
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$email = htmlspecialchars($_POST["email"]);
$phone = (int)$_POST["phone"];
$time= strtotime("now");
	echo '<h3>'.'mi e andata bene!!!<br>' .$username.' '.$password. ' '. $email. ' '. $phone.'</h3>';
	echo '<h3><br>fine della sofferenza</h3>';
	//  INSERIRE NELLA TABELLA 
	$sql= "INSERT INTO login (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')"; 
if (mysqli_query($connect, $sql)) {
    echo "New record created successfully";
} else {
    echo  mysqli_error($connect);
}
} else {
	 
	echo "mi e andatat male!!";
	
}
mysqli_close($connect);
?>
</body>
</html>
