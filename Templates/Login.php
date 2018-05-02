<?php
  session_start();
  require '../PHP/connection.php';

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user_table WHERE user_email='".$email."' AND user_password='".$password."' LIMIT 1";
    $result = $conn->query($sql);
    
    $getUserID = "SELECT user_id FROM user_table WHERE user_email='".$email."'";
    $query = mysqli_query($conn, $getUserID);
    $row = mysqli_fetch_assoc($query);

    if ($result->num_rows > 0) {
      $_SESSION['UserID'] = $row['user_id'];
      header('Location: ../index.php');
      exit();
    } else {
      echo "Email or Password incorrect!";
      exit();
    }
  }
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset = "UTF-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/Grid.css">
    <link rel="stylesheet" href="../Styles/Login.css">
  </head>

  <body>

    <div class="row login-container">
      <div class="column logo-container">
        <a class="logo-icon"><i class="glyphicon glyphicon-knight navIcon"></i></a>
        <h1 class="logo-text">Comic Trader</h1>
      </div>

      <div class="column login-form-container">
        <form method="post" action="login.php">
          <div class="form-group">
            <label>Email:</label>
            <input name="email" type="email" class="form-control" id="login-email" placeholder="Enter Email">
          </div>

          <div class="form-group">
            <label>Password:</label>
            <input name="password" type="password" class="form-control" id="login-password" placeholder="Enter Password">
          </div>

          <input class="btn btn-primary login-button" type="submit" value="Login" />
        </form>

        <a href="./SignUp.php" class="Sign-up-link">Don't have an account?</a>
      </div>
    </div>

  </body>
</html>