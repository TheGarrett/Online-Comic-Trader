<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <meta charset = "UTF-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/Grid.css">
    <link rel="stylesheet" href="../Styles/SignUp.css">
  </head>

  <body>

    <div class="sign-up-container">

      <h1 class="sign-up-title">Sign Up</h1>

      <form method="post" action="../PHP/create-account.php">
        <div class="row form-row">
          <div class="column">
            <div class="form-group">
              <label>Email:</label>
              <input name="email" type="email" class="form-control" id="login-email" placeholder="Enter Email">
            </div>

            <div class="form-group password-container">
              <label>Password:</label>
              <input name="password" type="password" class="form-control" id="login-password" placeholder="Enter Password">
            </div>
          </div>

          <div class="column question-2-container">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Top comic character:</label>
              <select class="form-control" name="comic_character">
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

            <div class="form-group">
              <label for="exampleFormControlSelect2">Top comic genre:</label>
              <select class="form-control" name="comic_genre">
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
        </div>

        <div class="row">
          <div class="column">
            <input class="btn btn-primary sign-up-button" type="submit" value="Sign Up" />
          </div>
        </div>
      </form>

    </div>

  </body>
</html>