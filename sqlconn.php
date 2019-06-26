<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="db_hotel";

$connessione= new mysqli($servername,$username,$password,$dbname);
if ($connessione && $connessione->connect_error) {
  echo "CONNESSIONE FALLITA:" . $connessione->connect_error;
  exit();
}
else{
  echo "CONNESSIONE STABILITA";
  exit();
}
?>
