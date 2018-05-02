<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>Vault</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Styles/Grid.css">
    <link rel="stylesheet" href="./Styles/Structure.css">
    <link rel="stylesheet" href="./Styles/Vault.css">
  </head>
  <body>
    <!-- Nav bar -->
    <div class="navbar">
      <a class="navIcon"><i class="glyphicon glyphicon-knight navIcon"></i></a>
      <a href="#">Vault</a>
      <a href="./Templates/AboutCharity.php">Charity</a>
      <a href="./Templates/Account.php">Account</a>
      <div class="logout">
        <a href="./Templates/login.php" class="logout">Logout</a>
      </div>
    </div>

    <!-- Main Page Container -->
    <div class="mainContainer">
      <div class="vault-title-con">
        <div style="width:90%;">
          <!-- Page Title -->
          <h1>The Vault</h1>
        </div>
        <div style="width:5%;">
          <?php
            session_start();
            require './PHP/connection.php';

            $UserID = $_SESSION['UserID'];

            $sql = "SELECT * FROM `user_table` WHERE `user_id` = $UserID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($row["admin"] == 1) {
                  echo "<span><a href='./Templates/Admin/AdminPage.php' class='settingsIcon'><i class='glyphicon glyphicon-cog'></i></a></span>";
                } else {
                  echo "Norm";
                }
              }
            }
          ?>
        </div>
      </div>
    
      <!-- New Comic Container -->
      <div class="comic-container">
        <div class="row">
          <h2>New Comics</h2>
        </div>
        <div class="comic-row wrap">

          <?php
            session_start();
            require './PHP/connection.php';

            $UserID = $_SESSION['UserID'];

            $sql = "SELECT * FROM comic_table WHERE `owner` = $UserID && `comic_read` = 0 ORDER BY comic_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Displays data in table brought back from query
              while($row = $result->fetch_assoc()) {
                echo "<div class='column comic-column'>
                  <div class='comic-box'>
                    <a href='./Templates/DetailNew.php?comic_id=". $row["comic_id"] ."' class='thumbnail'>
                      <img id='". $row["comic_id"] ."' src='". $row["comic_cover"] ."' alt='". $row["comic_title"] ."'>
                    </a>
                  </div>
                </div>";
              }
            } else {
              echo "<br />You don't have any new comics, please check again later!";
            }
          ?>

        </div>
      </div>
      
      <!-- Owned Comic Container -->
      <div class="comic-container">
        <div class="row read-comic-container">
          <div class="read-title">
            <h2>Read Comics</h2>
          </div>
          <div class="read-btn">
            <a class="btn btn-primary action-btn" href="./Templates/AddComic.php">Add Comic</a>
          </div>
        </div>
        <div class="comic-row wrap">

          <?php
            session_start();
            require './PHP/connection.php';

            $UserID = $_SESSION['UserID'];

            $sql = "SELECT * FROM comic_table WHERE `owner` = $UserID && `comic_read` = 1 ORDER BY comic_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Displays data in table brought back from query
              while($row = $result->fetch_assoc()) {
                echo "<div class='column comic-column'>
                  <div class='comic-box'>
                    <a href='./Templates/DetailOld.php?comic_id=". $row["comic_id"] ."' class='thumbnail'>
                      <img id='". $row["comic_id"] ."' src='". $row["comic_cover"] ."' alt='". $row["comic_title"] ."'>
                    </a>
                  </div>
                </div>";
              }
            } else {
              echo "<br />You don't have any new comics, please check again later!";
            }
          ?>
          
        </div>
      </div>
    </div>
  </body>
</html>