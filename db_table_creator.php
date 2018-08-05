<?php
require "./db_connector.php";
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS login (
fingerPrint1 VARCHAR(32) NOT NULL PRIMARY KEY,
id INT(6) NOT NULL AUTO_INCREMENT,
username VARCHAR(60) NOT NULL,
email VARCHAR(60) NOT NULL,
phone VARCHAR(12) NOT NULL,
password VARCHAR(70) NOT NULL,
reg_date TIMESTAMP,
INDEX(id)
) ENGINE = InnoDB";
if (mysqli_query($connect, $sql)) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table login: " . mysqli_error($connect);
}
$sql2 = "CREATE TABLE IF NOT EXISTS videos (
idVideo INT(6) AUTO_INCREMENT NOT NULL, 
fingerPrint2 VARCHAR(32) NOT NULL,
nomeVideo VARCHAR(30) NOT NULL,
descrizioneVideo VARCHAR(70) NOT NULL,
genereVideo VARCHAR (30) NOT NULL,
fileVideo VARCHAR(50) NOT NULL,
timestampVideo TIMESTAMP,
INDEX(idVideo),
FOREIGN KEY (fingerPrint2) REFERENCES login (fingerPrint1)
)ENGINE =InnoDB";
if (mysqli_query($connect, $sql2)) {
    echo "Table Videos created successfully";
} else {
    echo "  Error creating table videos: " . mysqli_error($connect);
}
mysqli_close($connect);
?>