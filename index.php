<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (isset($_POST['username'])&&($_POST['password'])&&($_POST['email'])&&($_POST['phone']) ){
	echo $_POST['username'];
} else {
	 //$rispo="ok ce lhai fatta ma adesso...";
	echo "cazzoooo";
	
}


?>