<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "store";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>