<?php
include 'db_config.php';
include 'functions.php';

$connessione=connessione_db($servername,$username,$password,$dbname);

if ($connessione && $connessione->connect_error) {
  echo ("CONNESSIONE FALLITA:" . $connessione->connect_error);
  exit();
}

if(empty($_POST)) {
  echo "si è verificato un errore";
  exit();
}

$idStanza = intval($_POST['id']);
$NumeroStanza = intval($_POST['room_number']);
$piano = intval($_POST['floor']);
$numeroLetti = intval($_POST['beds']);

$sql = "UPDATE stanze SET room_number = $NumeroStanza, floor = $piano, beds = $numeroLetti, updated_at = NOW() WHERE id = $idStanza";
$result = $connessione->query($sql);
?>

<?php
include 'layout/_head.php';
include 'layout/_header.php';
?>

<div class="container">
  <div class="jumbotron">
    <?php if($result) { ?>
      <h1 class="alert alert-success py-2" role="alert">Modifica effettuata con successo!</h1>
      <?php } else { ?>
        <h1 class="alert alert-danger py-2" role="alert">Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
      <?php } ?>
    <a class="btn btn-primary btn-lg btnback" href="index.php" role="button">Visualizza tutte le stanze</a>
  </div>
</div>

<?php
$connessione-> close();
?>
