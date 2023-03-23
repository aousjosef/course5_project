<?php
include("includes/config.php");

// anslut til DB

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

if ($db->connect_errno > 0) {
  die("fel vid anslutning till db " . $db->connect_errno);
}

//SQL - Frågor

$sql = "DROP TABLE IF EXISTS users;"; //Tabort tabell om den existerar redan (farlig)

$sql .= "CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(80) NOT NULL
  );";

$sql .= "DROP TABLE IF EXISTS posts;"; //Tabort tabell om den exister


$sql .= "CREATE TABLE posts (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    author VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author) REFERENCES users(username)
  );";


//Skicka fråga till server
if ($db->multi_query($sql)) {
  echo "<pre>$sql</pre>";
  echo "Tabell installerad";
} else {
  echo "fel vid installion av tabell";
}
