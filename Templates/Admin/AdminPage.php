<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Styles/Structure.css">
    <link rel="stylesheet" href="../../Styles/Grid.css">
    <link rel="stylesheet" href="../../Styles/Admin.css">
  </head>
  <body>
    <!-- Nav bar -->
    <div class="navbar">
      <a class="navIcon"><i class="glyphicon glyphicon-knight navIcon"></i></a>
      <a href="../../index.php">Vault</a>
      <a href="../AboutCharity.php">Charity</a>
      <a href="../Account.php">Account</a>
      <div class="logout">
        <a href="../Login.php" class="logout">Logout</a>
      </div>
    </div>

    <!-- Main Page Container -->
    <div class="mainContainer">
      <!-- Page Title -->
      <h1>The Vault</h1>

      <!-- New Comic Container -->
      <div class="admin-container">
        <?php
          require '../../PHP/connection.php';

          $sql = "SELECT * FROM `comic_table` WHERE `charity` = 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Displays data in table brought back from query
            
            echo "<div class='tableContainer'>
              <table class='table'>
                <thead>
                  <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Comic Title</th>
                    <th scope='col'>Genre</th>
                    <th scope='col'>Lead Character</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Remove</th>
                  </tr>
                </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                    <th scope='row'>". $row["comic_id"] ."</th>
                    <td>". $row["comic_title"] ."</td>
                    <td>". $row["comic_genre"] ."</td>
                    <td>". $row["comic_lead_character"] ."</td>
                    <td>". $row["comic_description"] ."</td>
                    <td>
                      <a class='textLink' href='../../PHP/remove.php?comic_id=" .  $row["comic_id"] . "''>Remove</a>
                    </td>
                  </tr>";
                }
                echo "</tbody>
              </table>
            </div>";
      
          }
          else {
            echo "<br />There are no comics donated to charity, please check again later!";
          }
        ?>
      </div>
    
    </div>
  </body>
</html>