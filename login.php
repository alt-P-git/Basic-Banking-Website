<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trust Bank - Login</title>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <header>
      <img id="logo" src="logo.png" alt="Bank Logo" />
      <h1 id="bank-name">Trust Bank</h1>
    </header>
    <div id="login-form">
      <h2>Login</h2>
      <form action="login_check.php" method="post">
        <div class="username">
          <div>User name:</div>
          <div><input type="text" name="userid"/></div>
        </div>
        <div class="password">
          <div>Password:</div>
          <div><input type="password" name="pass"/></div>
        </div>
        <div class="buttons">
          <button type="submit">Login Now</button>
        </div>
      </form>
    </div>
  </body>
</html>