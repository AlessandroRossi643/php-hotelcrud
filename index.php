<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Db_Hotel</title>
    <link rel="stylesheet" href="public/css/app.css">
  </head>
  <body>
    <div class="container">
      <?php include 'sqlconn.php' ?>

      <?php
      $sql = "SELECT * FROM stanze";
      $result = $connessione->query($sql);
      if ($result && $result->num_rows > 0) {
      ?>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <td>ID</td>
              <td>Numero Stanze</td>
              <td>Piano</td>
              <td>Numero letti</td>
            </tr>

        <?php while ($row=$result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['room_number'];?></td>
              <td><?php echo $row['floor'];?></td>
              <td><?php echo $row['beds'];?></td>
            </tr> <?php
          }
        }
        elseif ($result) {
          echo "0 results";
        }
        else{
          echo "query error";
        }
        $connessione-> close();
        ?>
          </table>
        </div>
    </div>
  </body>
</html>
