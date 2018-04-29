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

      <form method="post" action="CreateAccount.php">
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
              <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Top comic genre:</label>
              <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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