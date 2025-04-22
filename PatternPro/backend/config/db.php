<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patternpro";

$conn_check = new mysqli($servername, $username, $password);
if ($conn_check->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn_check->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn_check->query($sql) === TRUE) {
    $conn_check->close();
} else {
    die("Błąd podczas tworzenia bazy danych: " . $conn_check->error);
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
