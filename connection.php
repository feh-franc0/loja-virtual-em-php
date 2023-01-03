<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = 3306;


try {
  $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
  // echo "conexão feita com sucesso";

} catch (Exception $ex) {
  // echo "Error as conectar com o banco: " . $ex;
  //die("Erro: por favor tente novamente mais tarde!<br>");
}