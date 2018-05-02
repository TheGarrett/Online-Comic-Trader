<!DOCTYPE HTML>
<html lang = "en">
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
      <!-- Page Title -->
      <h1>Account</h1>

      <div class="account-container">
        <form method="post" action="../PHP/update.php">
        
          <!-- Suggestion Off/On Selection -->
          <div class="row">
            <div class="column form-columns form-text-container">
              <label for="exampleFormControlSelect2">Comic Suggestion:</label>
            </div>
            <div class="column form-columns form-option-1">
              <div class="radio">
                <label>
                  <input type="radio" name="suggestion" id="optionsRadios1" value="1" checked>
                  Yes
                </label>

                <label>
                  <input type="radio" name="suggestion" id="optionsRadios2" value="0">
                  No
                </label>
              </div>
            </div>
          </div>

          <!-- Comic Character Selection -->
          <div class="row">
            <div class="column form-columns form-text-container">
              <label for="exampleFormControlSelect2">Top comic character:</label>
            </div>
            <div class="column form-columns form-option-container">
              <select name="character" class="form-control" id="exampleFormControlSelect2">
                <?php
                  require '../PHP/connection.php';

                  $sql = "SELECT DISTINCT comic_lead_character FROM comic_table";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // Displays data in table brought back from query
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='". $row["comic_lead_character"] ."'>". $row["comic_lead_character"] ."</option>";
                    }
                  } else {
                    echo "<option>No Characters</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <!-- Comic Genre Selection -->
          <div class="row">
            <div class="column form-columns form-text-container">
              <label for="exampleFormControlSelect2">Top comic genre:</label>
            </div>
            <div class="column form-columns form-option-container">
              <select name="genre" class="form-control" id="exampleFormControlSelect2">
                <?php
                  require '../PHP/connection.php';

                  $sql = "SELECT DISTINCT comic_genre FROM comic_table";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // Displays data in table brought back from query
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='". $row["comic_genre"] ."'>". $row["comic_genre"] ."</option>";
                    }
                  } else {
                    echo "<option>No Genres</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="row button-container">
            <div class="column form-columns form-text-container"></div>
            <div class="column form-columns">
              <input class="btn btn-primary sign-up-button" type="submit" value="Save" />
            </div>
          </div>

        </form>
      </div>

    </div>
  </body>
</html>