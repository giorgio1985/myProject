<?php

session_start();

require './db_connector.php';
require './db_table_creator.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customs";

$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['log_username'], $_POST['log_password'])) {
	
	$_log_username = htmlspecialchars($_POST["log_username"]);
	$_log_password = htmlspecialchars($_POST["log_password"]);
	

	$_username_match=preg_match('/^[0-9a-z_-]{8,32}$/i', $_log_username);
    $_password_match=preg_match('/^[0-9a-z_-]{8,64}$/i', $_log_password);

   if (!($_username_match) || !($_password_match)) {
  mysqli_close($connect);
   $back0 = <<<RETURN_BACK0
<script type="text/javascript">
  window.location.href="./createProfile.html";
</script>
RETURN_BACK0;

echo $back0;
}
//echo "Welcome mr: " .$_log_username;

// here send infos db....
$decript_password = md5($_log_password);
$select_profile = "SELECT username, password FROM login WHERE username = '$_log_username' && password = '$decript_password'";
$result = mysqli_query($connect, $select_profile);
if (mysqli_num_rows($result)>0) {
  echo " password match! ";
  echo " username: ".$_log_username;
  echo " md5 pass: ".$decript_password;
    $welcome = <<<RETURN_BACK4
<script type="text/javascript">
  window.location.href="./private.php";
</script>
RETURN_BACK4;

echo $welcome;
}else if (mysqli_num_rows($result)==0) {
  $back3 = <<<RETURN_BACK3
<script type="text/javascript">
  window.location.href="./logPage.html";
</script>
RETURN_BACK3;

echo $back3;
}


}





mysqli_close($connect);

?>