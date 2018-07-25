<?php
require "./db_connector.php";
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS login (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(60) NOT NULL,
email VARCHAR(60) NOT NULL,
phone VARCHAR(12) NOT NULL,
password VARCHAR(70) NOT NULL,
reg_date TIMESTAMP
) ENGINE = InnoDB";
if (mysqli_query($connect, $sql)) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}
$sql2 = "CREATE TABLE IF NOT EXISTS videos (
idVideo INT(6) NOT NULL, 
nomeVideo VARCHAR(30) NOT NULL,
durataVideo INT(6) NOT NULL,
descrizioneVideo VARCHAR(70) NOT NULL,
genereVideo VARCHAR (30) NOT NULL,
timestampVideo TIMESTAMP,
FOREIGN KEY (idVideo) REFERENCES login (id)
)ENGINE =InnoDB";
if (mysqli_query($connect, $sql2)) {
    echo "Table Videos created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}
mysqli_close($connect);
?>