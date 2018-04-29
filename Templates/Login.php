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