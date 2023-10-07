<?php
include("auth_session.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trust Bank</title>
    <link rel="stylesheet" href="account_detail.css" />
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
    </nav><br><br><br><br><br><br>
    <div class="details">
        <?php
        include('connection.php');
        if (isset($_POST['update'])) {
            $uid = $_GET['uid'];
            $cust_name = $_POST['customer_name'];
            $addr = $_POST['customer_street'];
            $city = $_POST['customer_city'];

            $updated = mysqli_query($connection, "UPDATE customer SET customer_name='$cust_name', customer_street='$addr', customer_city='$city' WHERE customer_name='$uid'");

            if ($updated) {
                header("Location: account_detail.php?uid=$uid");
            }
        } else {
            $uid = $_GET['uid'];
            $sql = "SELECT customer_name, customer_street, customer_city FROM customer WHERE customer_name='" . $uid . "'";
            $res = mysqli_query($connection, $sql);
            $result = mysqli_fetch_assoc($res);
        }
        ?>
        <div id="maincontainer">
        <form method="POST">
           

            <h2>Edit details</h2>
                <table id="container">
                    <tr class="custname">
                        <td>Customer name:</td>
                        <td><input type="text" name="customer_name" value="<?php echo $result['customer_name'] ?>" /></td>
                    </tr>
                    <tr class="address">
                        <td>Address:</td>
                        <td><input type="text" name="customer_street" value="<?php echo $result['customer_street'] ?>" /></td>
                    </tr>
                    <tr class="city">
                        <td>City:</td>
                        <td><input type="text" name="customer_city" value="<?php echo $result['customer_city'] ?>" /></td>
                    </tr>
                </table>
                <p><input type="submit" name="update" value="Update"></p>
        </form>
        </div>
    </div>
</body>

</html>