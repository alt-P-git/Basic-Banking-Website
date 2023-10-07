<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trust Bank</title>
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

    if (isset($_REQUEST['branch_name'])) {
        $branch_name = stripslashes($_REQUEST['branch_name']);
        $branch_name = mysqli_real_escape_string($connection, $branch_name);
        $branch_city = stripslashes($_REQUEST['branch_city']);
        $branch_city = mysqli_real_escape_string($connection, $branch_city);
        $assets = $_REQUEST['assets'];
        $sql = "SELECT COUNT(*) as count FROM branch where branch_name = '$branch_name' AND branch_city = '$branch_city' AND assets = '$assets';";
        $res = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($res);
        if ($row['count'] > 0) {
            echo "<div id='login-form'>
              <h3>Branch already exists</h3><br/>
              <p class='link'>Click here to <a href='add_branch.php'>Add branch</a></p>
            </div>";
        } else {
            $query    = "INSERT into `branch` (branch_name, branch_city, assets)
                     VALUES ('$branch_name', '$branch_city', '$assets')";
            $result   = mysqli_query($connection, $query);
            if ($result) {
                echo "<div id='login-form'>
                <h3>Branch added successfully.</h3><br/>
              </div>";
            } else {
                echo "<div id='login-form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='add_branch.php'>Add branch</a></p>
              </div>";
            }
        }
    } else {
    ?>

        <div id="login-form">
            <h2>Add a new branch</h2>
            <form>
                <div class="custname">
                    <div>
                        <p>Branch name:</p>
                    </div>
                    <div><input type="text" name="branch_name" /><br /></div>
                </div>
                <div class="address">
                    <div>
                        <p>City:</p>
                    </div>
                    <div><textarea cols="22" rows="3" name="branch_city"></textarea><br /></div>
                </div>
                <div class="city">
                    <div>
                        <p>Assets:</p>
                    </div>
                    <div><input type="number" name="assets" max="99999999"/><br /></div>
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