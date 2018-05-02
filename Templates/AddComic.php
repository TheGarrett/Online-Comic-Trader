<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Add Comic</title>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/Structure.css">
    <link rel="stylesheet" href="../Styles/Grid.css">
    <link rel="stylesheet" href="../Styles/CreateComic.css">
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
      <!-- Page Title -->
      <h1>Add Comic</h1>

      <div class="add-comic-container">
        <form method="post" action="../PHP/create-comic.php">
          <!-- Comic Title Selection -->
          <div class="row">
            <label>Comic Title:</label>
            <input name="comic-title" type="text" class="form-control" id="new-comic" placeholder="Enter Comic Title">
          </div>

          <!-- Comic Genre Selection -->
          <div class="row">
            <label>Comic Genre:</label>
            <select name="comic_genre" class="form-control">
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

          <!-- Comic Character Selection -->
          <div class="row">
            <label>Lead Character:</label>
            <select name="comic_character" class="form-control">
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

          <!-- Comic Cover URL Selection -->
          <div class="row">
            <label>Comic URL:</label>
            <input name="comic-url" type="text" class="form-control" id="new-comic" placeholder="Enter Comics Cover URL">
          </div>

          <!-- Comic Description Selection -->
          <div class="row">
            <label>Comic Description:</label>
            <textarea name="comic-description" type="text" class="form-control" placeholder="Enter Comics Description"></textarea>
          </div>

          <!-- Submit Button -->
          <div class="row btn-container">
            <input class="btn btn-primary action-btn" type="submit" value="Save" />
          </div>
        </form>
      </div>
    
    </div>
  </body>
</html>