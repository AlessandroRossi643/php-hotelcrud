<?php
include 'db_config.php';
include 'functions.php';

$connessione=connessione_db($servername,$username,$password,$dbname);

if ($connessione && $connessione->connect_error) {
  echo ("CONNESSIONE FALLITA:" . $connessione->connect_error);
  exit();
}

$sql = "SELECT * FROM stanze";
$result = $connessione->query($sql);
?>

<?php
include 'layout/_head.php';
include 'layout/_header.php';
?>

<div class="container">
  <h1>TUTTE LE STANZE DELL'HOTEL</h1>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Room Number</th>
        <th class="text-center">Floor</th>
        <th class="text-center">Beds</th>
        <th class="text-center">Created At</th>
        <th class="text-center">Updated At</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
  <tbody>
<?php
  if ($result && $result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id'];?></td>
              <td class="text-center"><?php echo $row['room_number'];?></td>
              <td class="text-center"><?php echo $row['floor'];?></td>
              <td class="text-center"><?php echo $row['beds'];?></td>
              <td class="text-center"><?php echo $row['created_at'];?></td>
              <td class="text-center"><?php echo $row['updated_at'];?></td>
              <td class="text-center">

                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?php echo $row['id']?>"
                    type="button" class="btn btn-primary"> Visualizza </a>
                  <a href="edit.php?id=<?php echo $row['id'] ?>"
                    type="button" class="btn btn-success"> Modifica </a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger">Cancella</a>

                </div>
              </td>
            </tr> <?php
          }
        }
        elseif ($result) {
          ?> <div class="alert alert-danger py-2" role="alert"><?php echo "0 Results"?></div> <?php
        }
        else{
          ?> <div class="alert alert-danger py-2" role="alert"><?php echo "Query error"?></div> <?php
        }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>
<?php
$connessione-> close();
?>
