<?php

session_start();
//require './insert_video.php';
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
	echo " is isset";

echo '<br>';
echo $_POST['load_name']. '<br>';
echo $_POST['load_description']. '<br>';
echo $_POST['load_genere']. '<br>';
echo $_FILES['load_files']['name']. '<br>';

$_name_video = htmlspecialchars($_POST['load_name']);
$_description_video = htmlspecialchars($_POST['load_description']);
$_genere_video = htmlspecialchars($_POST['load_genere']);
$_files_video = htmlspecialchars($_FILES['load_files']['name']);

$_match_name_video = preg_match('/^[a-z0-9\s._-]{2,30}$/i', $_name_video);
$_match_description_video = preg_match('/^[a-z0-9\s._-]{2,70}$/i', $_description_video);
$_match_genere_video= preg_match('/^[a-z0-9\s.]{2,30}$/', $_genere_video);
$_match_file_video = preg_match('/^[a-z0-9\s._-]{2,42}\.[a-z]{2,5}$/i', $_files_video);

if (!($_match_name_video) || !($_match_description_video) || !($_match_genere_video) || !($_match_file_video)) {
	if (!($_match_name_video)){
	echo "error to match name video";
}elseif ( !($_match_description_video) ) {
	echo "error to match _description_video";
}elseif (!($_match_genere_video)) {
	echo "error to match genere video";
}elseif (!($_match_file_video)) {
	echo "error to match file video";
}
  mysqli_close($connect);
 $back = <<<RETURN_BACK
<script type="text/javascript">
  window.location.href="./insert_video.php";
</script>
RETURN_BACK;

echo $back; 
}
else
echo "ok matching";
echo $_SESSION["user"];
$prova=$_SESSION["user"];

$select_table_login = "SELECT fingerPrint1 FROM login WHERE username = '$prova'";

$result_login = mysqli_query($connect, $select_table_login);
$row=mysqli_fetch_array($result_login,MYSQLI_ASSOC);
$_finger_print1=$row['fingerPrint1'];
echo $row['fingerPrint1'];
if ($result_login) {
  $sql= "INSERT INTO videos (fingerPrint2, nomeVideo, descrizioneVideo, genereVideo, fileVideo) VALUES ('$_finger_print1', '$_name_video', '$_description_video','$_genere_video', '$_files_video')"; 
  if (mysqli_query($connect, $sql)) {
  	echo "ok insert to video table";
$_SESSION["nomevideo"]=$_finger_print;
$_SESSION["descrizionevideo"]=$_username;
$_SESSION["generevideo"]=$_password;
$_SESSION["filevideo"]=$_email;

  $stringa = <<<MY_MARKER
<script type="text/javascript">
  window.location.href="./videoBox.php";
</script>
MY_MARKER;

echo $stringa;
  }  else  echo  mysqli_error($connect);

}//mysqli_close($connect);
}
?>
