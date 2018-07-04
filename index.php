<?php

if (isset($_POST["username"]) && ($_POST["password"]) && ($_POST["email"]) && ($_POST["phone"])){
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
	echo "mi e andata bene!!!";

} else {
	 
	echo "mi e andatat male!!!";
	
}
?>