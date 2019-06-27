<?php
function connessione_db($servername,$username,$password,$dbname){
  $connessione= new mysqli($servername,$username,$password,$dbname);
  return $connessione;
}
?>
