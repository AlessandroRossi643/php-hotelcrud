<?php
include 'db_config.php';
include 'functions.php';

$connessione=connessione_db($servername,$username,$password,$dbname);

if ($connessione && $connessione->connect_error) {
  echo ("CONNESSIONE FALLITA:" . $connessione->connect_error);
  exit();
}

$idStanza=intval($_GET["id"]);

$sql = "SELECT * FROM stanze WHERE id= $idStanza";
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
    <?php if ($result && $result->num_rows > 0) {
      $row=$result-> fetch_assoc() ?>
        <ul>
          <li><strong>Piano:</strong> <?php echo $row['floor'] ?></li>
           <li><strong>Numero letti:</strong> <?php echo $row['beds'] ?></li>
           <li><strong>Inserita il:</strong> <?php echo $row['created_at'] ?></li>
           <li><strong>Aggiornata il:</strong> <?php echo $row['updated_at'] ?></li>
        </ul> <?php
    }
    elseif ($result) {
      ?> <div class="alert alert-danger py-2" role="alert"><?php echo "0 Results"?></div> <?php
    }
    else{
      ?> <div class="alert alert-danger py-2" role="alert"><?php echo "Query error"?></div> <?php
    }?>

    <a class="btn btn-primary btn-lg btnback" href="index.php" role="button">Visualizza tutte le stanze</a>
  </div>
</div>

<?php
$connessione-> close();
?>
