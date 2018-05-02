<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Comic Detail</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/Structure.css">
    <link rel="stylesheet" href="../Styles/Grid.css">
    <link rel="stylesheet" href="../Styles/Detail.css">
  </head>
  <body>
    <!-- Nav bar -->
    <div class="navbar">
      <a class="navIcon"><i class="glyphicon glyphicon-knight navIcon"></i></a>
      <a href="../index.php">Vault</a>
      <a href="./AboutCharity.php">Charity</a>
      <a href="./Account.php">Account</a>
      <div class="logout">
        <a href="./Login.php" class="logout">Logout</a>
      </div>
    </div>

    <!-- Main Page Container -->
    <div class="mainContainer">
      <?php
        require '../PHP/connection.php';

        $id = $_GET['comic_id'];

        $sql = "SELECT * FROM `comic_table` WHERE `comic_id` = '".$id."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Displays data in table brought back from query
          while($row = $result->fetch_assoc()) {
            echo "<h1>". $row["comic_title"] ."</h1>
            <div class='detail-container'>
              <div class='row button-container'>
                <a class='btn btn-primary action-btn donate-btn' href='../PHP/donate.php?comic_id=" .  $row["comic_id"] . "''>Donate</a>
                <a class='btn btn-primary action-btn' href='../PHP/trade.php?comic_id=" .  $row["comic_id"] . "''>Trade</a>
              </div>
              <div class='row detail-information-container'>
                <div class='comic-box'>
                  <img class='detail-image' id='". $row["comic_id"] ."' src='". $row["comic_cover"] ."' alt='". $row["comic_title"] ."'>
                </div>
                <div class='comic-detail-info'>
                  <div>
                    <label>Genre: </label>
                    <span>". $row["comic_genre"] ."</span>
                  </div>
                  <div>
                    <label>Lead Character: </label>
                    <span>". $row["comic_lead_character"] ."</span>
                  </div>
                  <div>
                    <label>Description: </label>
                    <span>". $row["comic_description"] ."</span>
                  </div>
                </div>
              </div>
            </div>";
          }
        } else {
          echo "<br />You don't have any new comics, please check again later!";
        }
      ?>
    </div>
  </body>
</html>