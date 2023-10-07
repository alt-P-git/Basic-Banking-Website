<?php
include("auth_session.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account detail-Trust Bank</title>
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
        $uid = $_GET['uid'];
        $sql = "select customer_name, customer_street, customer_city from customer where customer_name='" . $uid . "'";
        $res = mysqli_query($connection, $sql);
        $cust_name = '';
        $addr = '';
        $city = '';
        if ($result = mysqli_fetch_assoc($res)) {
            $cust_name = $result['customer_name'];
            $addr = $result['customer_street'];
            $city = $result['customer_city'];
        ?>
            <div id="maincontainer">
                <h2>Customer details</h2>
                <table id="container">
                    <tr class="custname">
                        <td>Customer name:</td>
                        <td><?php echo $cust_name ?></td>
                    </tr>
                    <tr class="address">
                        <td>Address:</td>
                        <td><?php echo $addr ?></td>
                    </tr>
                    <tr class="city">
                        <td>City:</td>
                        <td><?php echo $city ?></td>
                    </tr>
                </table>
                <a href="edit_customer.php?uid=<?php echo $uid ?>">Edit</a>
            </div>
        <?php
        } ?>
    </div>
</body>
</html>