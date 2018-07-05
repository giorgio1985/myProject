<?php
require './db_table_creator.php';
session_start();
if (isset($_POST['username'], $_POST['email'],  $_POST['phone'], $_POST['password'])){
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$email = htmlspecialchars($_POST["email"]);
$phone = (int)$_POST["phone"];
	echo '<h3>'.'mi e andata bene!!!<br>' .$username.' '.$password. ' '. $email. ' '. $phone.'</h3>';
	echo '<h3><br>fine della sofferenza'.$phone.'</h3>';
	//  INSERIRE NELLA TABELLA 


} else {
	 
	echo "mi e andatat male!!";
	
}
?>