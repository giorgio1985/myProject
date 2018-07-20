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
$_phone = (int)$_POST["phone"];
$_time= strtotime("now");

$select_table = "SELECT * FROM login WHERE username = $_username, password = $_password, email = $_email, phone = $_phone";
$result = mysqli_query($connect, $select_table);
if(mysqli_num_rows($result)>0){
  $back = <<<RETURN_BACK
<script type="text/javascript">
  window.location.href="./logPage.php";
</script>
RETURN_BACK;

echo $back;
} 
	//echo '<h3>'.'mi e andata bene!!!<br>' .$_username.' '.$_password. ' '. $_email. ' '. $_phone.'</h3>';
	//echo '<h3><br>fine della sofferenza</h3>';
        //  INSERIRE NELLA TABELLA 

	
	
	
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
