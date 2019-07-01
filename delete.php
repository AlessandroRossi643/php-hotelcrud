<?php
include 'db_config.php';
include 'functions.php';

$connessione=connessione_db($servername,$username,$password,$dbname);

if ($connessione && $connessione->connect_error) {
  echo ("CONNESSIONE FALLITA:" . $connessione->connect_error);
  exit();
}

$idStanza=intval($_GET["id"]);

$sql = "DELETE FROM stanze WHERE id = $id";
$result = $connessione->query($sql);
?>

<?php
include 'layout/_head.php';
include 'layout/_header.php';
?>

<div class="container">
  <div class="jumbotron">
  <h1 class="display-4">Stanza ID: <?php echo $idStanza; ?></h1>
  <hr class="my-4">
  <?php if ($result) { ?>
    <h1>Stanza cancellata!</h1>
  <?php } else{ ?>
    <h1 class="alert alert-danger py-2" role="alert">Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
  <?php } ?>

  <a class="btn btn-primary btn-lg btnback" href="index.php" role="button">Visualizza tutte le stanze</a>
</div>
</div>

<?php
$connessione-> close();
?>
