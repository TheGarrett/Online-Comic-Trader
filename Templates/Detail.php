<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Account</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/Structure.css">
    <link rel="stylesheet" href="../Styles/Grid.css">
    <link rel="stylesheet" href="../Styles/Account.css">
  </head>
  <body>
    <!-- Nav bar -->
    <div class="navbar">
      <a class="navIcon"><i class="glyphicon glyphicon-knight navIcon"></i></a>
      <a href="../index.php">Vault</a>
      <a href="./AboutCharity.php">Charity</a>
      <a href="#">Account</a>
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
            <div class='account-container'>
  
              <label></label>
              <span></span>
            </div>";
          }
        } else {
          echo "<br />You don't have any new comics, please check again later!";
        }
      ?>
    </div>
  </body>
</html>