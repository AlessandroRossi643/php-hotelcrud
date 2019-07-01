<?php
include 'db_config.php';
include 'functions.php';

$connessione=connessione_db($servername,$username,$password,$dbname);

if ($connessione && $connessione->connect_error) {
  echo ("CONNESSIONE FALLITA:" . $connessione->connect_error);
  exit();
}

$idStanza=intval($_GET["id"]);

$sql = "SELECT * FROM stanze WHERE id = $idStanza";
$result = $connessione->query($sql);
?>

<?php
include 'layout/_head.php';
include 'layout/_header.php';
?>

<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Stanza ID: <?php echo $idStanza; ?></h1>
    <p class="lead">MODIFICA STANZA:</p>
    <hr class="my-4">
    <?php
      if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <form method="post" action="editModified.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

          <div class="form-group">
            <label for="room_number">Numero stanza:</label>
            <input class="form-control" type="text" placeholder="numero stanza"
              value="<?php echo $row['room_number'] ?>" name="room_number">
          </div>

          <div class="form-group">
            <label for="piano">Piano:</label>
            <input class="form-control" type="number" placeholder="piano"
              value="<?php echo $row['floor'] ?>" name="floor">
          </div>

          <div class="form-group">
            <label for="beds">Numero letti:</label>
            <input class="form-control" type="number" placeholder="numero letti"
              value="<?php echo $row['beds'] ?>" name="beds">
          </div>

          <div class="form-group">
            <input type="submit" value="Salva" class="btn btn-success">
          </div>
        </form>
        <?php
      } elseif($result) {
        ?> <div class="alert alert-danger py-2" role="alert"><?php echo "0 Results"?></div> <?php
      } else {
        ?> <div class="alert alert-danger py-2" role="alert"><?php echo "Query error"?></div> <?php
      }
      ?>
  </div>
</div>

<?php
$connessione-> close();
?>
