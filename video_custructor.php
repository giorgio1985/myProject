<?php

echo "custructor";
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

if (isset($_POST['load_name'], $_POST['load_description'],  $_POST['load_genere'], $_FILES['load_files']['name'])){
	echo "is isset";
}
echo '<br>';
echo $_POST['load_name']. '<br>';
echo $_POST['load_description']. '<br>';
echo $_POST['load_genere']. '<br>';
echo $_FILES['load_files']['name']. '<br>';

  ?>
