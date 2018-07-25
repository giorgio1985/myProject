<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
require './db_connector.php';
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
$_password = md5(htmlspecialchars($_POST["password"]));
$_email = htmlspecialchars($_POST["email"]);
$_phone = $_POST["phone"];
$_time= strtotime("now");

//REG EXPRESS HERE ....

$_username_match=preg_match('/^[0-9a-z_-]{8,32}$/i', $_username);
$_password_match=preg_match('/^[0-9a-z_-]{8,64}$/i', $_password);
$_email_match=preg_match('/^[0-9a-z._-]{2,60}\@[0-9a-z_-]{2,60}\.[a-z]{2,8}$/i', $_email);
$_phone_match=preg_match('/^[0-9]{10,12}$/', $_phone);
if (!($_username_match) || !($_password_match) || !($_email_match) || !($_phone_match)) {
  mysqli_close($connect);
   $back0 = <<<RETURN_BACK0
<script type="text/javascript">
  window.location.href="./createProfile.html";
</script>
RETURN_BACK0;

echo $back0; 
}


$select_table = "SELECT * FROM login WHERE username = '$_username' OR password = '$_password' OR email = '$_email' OR phone = '$_phone'";
$result = mysqli_query($connect, $select_table);
if(mysqli_num_rows($result)>0){
  mysqli_close($connect);
  $back = <<<RETURN_BACK1
<script type="text/javascript">
  window.location.href="./logPage.html";
</script>
RETURN_BACK1;

echo $back;
} 

	
	
	
	$sql= "INSERT INTO login (username, email, phone, password) VALUES ('$_username', '$_email', '$_phone', '$_password')"; 
if (mysqli_query($connect, $sql)) {
$_SESSION["user"]=$_username;
$_SESSION["pass"]=$_password;
$_SESSION["emai"]=$_email;
$_SESSION["time"]=$_time;
    echo "New record created successfully";
  $str = <<<MY_MARKER
<script type="text/javascript">
  window.location.href="./private.php";
</script>
MY_MARKER;

echo $str;
} else {
    echo  mysqli_error($connect);
}
}
mysqli_close($connect);
?>
</body>
</html>
