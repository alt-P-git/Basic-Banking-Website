<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register customer-Trust Bank</title>
  <link rel="stylesheet" href="register.css" />
</head>

<body>
  <header>
    <img id="logo" src="logo.png" alt="Bank Logo" />
    <h1 id="bank-name">Trust Bank</h1>
  </header>
  <nav>
    <a href="./loggedin.php">Dashboard</a>
    <a href="./register.php">Open A/C</a>
    <a href="#">Loan</a>
    <a href="#">Deposit</a>
    <a href="./allbranches.php">All Branch details</a>
    <a href="./allcustomers.php">All Customer Details</a>
    <a href="./logout.php">Log out</a>
  </nav>

  <?php
  include('connection.php');

  if (isset($_REQUEST['custname'])) {
    $custname = stripslashes($_REQUEST['custname']);
    $custname = mysqli_real_escape_string($connection, $custname);
    $addr    = stripslashes($_REQUEST['addr']);
    $addr    = mysqli_real_escape_string($connection, $addr);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($connection, $city);
    $sql = "SELECT COUNT(*) as count FROM customer where customer_name = '$custname' AND customer_street = '$addr' AND customer_city = '$city';";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);
    if ($row['count']>0) {
      echo "<div id='login-form'>
              <h3>Customer already exists</h3><br/>
              
              <p class='link'>Click here to <a href='register.php'>register</a></p>
            </div>";
    } else {
      $query    = "INSERT into `customer` (customer_name, customer_street, customer_city)
                     VALUES ('$custname', '$addr', '$city')";
      $result   = mysqli_query($connection, $query);
      if ($result) {
        echo "<div id='login-form'>
                <h3>Customer registered successfully.</h3><br/>
              </div>";
      } else {
        echo "<div id='login-form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='register.php'>register</a>.</p>
              </div>";
      }
    }
  } else {
  ?>

    <div id="login-form">
      <h2>Register a new customer</h2>
      <form>
        <div class="custname">
          <div>
            <p>Customer name:</p>
          </div>
          <div><input type="text" name="custname" /><br /></div>
        </div>
        <div class="address">
          <div>
            <p>Address:</p>
          </div>
          <div><textarea cols="22" rows="3" name="addr"></textarea><br /></div>
        </div>
        <div class="city">
          <div>
            <p>City:</p>
          </div>
          <div><input type="text" name="city" /><br /></div>
        </div>
        <div class="buttons">
          <button type="submit">Submit</button>
          <button type="reset">Reset</button>
        </div>
      </form>
    </div>
  <?php } ?>
</body>

</html>