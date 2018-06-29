<?php
require "./db_connect.php";
// sql to create table


$sql = "CREATE TABLE IF NOT EXISTS login (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
cognome VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(70) NOT NULL,
reg_date TIMESTAMP
) ENGINE = InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql2 = "CREATE TABLE IF NOT EXISTS videos (
idVideo INT(6) NOT NULL, 
nomeVideo VARCHAR(30) NOT NULL,
cognome VARCHAR(30) NOT NULL,
durata INT(6) NOT NULL,
descrizione VARCHAR(70) NOT NULL,
video_date TIMESTAMP,
FOREIGN KEY (idVideo) REFERENCES login (id)
)ENGINE =InnoDB";

if (mysqli_query($conn, $sql2)) {
    echo "Table Videos created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>