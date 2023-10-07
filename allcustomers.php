<?php
include("auth_session.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All customers-Trust Bank</title>
    <link rel="stylesheet" href="form1.css" />
</head>

<body>
    <div style="display: block;">
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
    </div>

    <div class="tableContainer">
        <div class="table1" style="margin-top: 300px;">
            <p>List of all customers</p>
            <?php
            include('./connection.php');
            $sql = "select * FROM customer";
            $res = mysqli_query($connection, $sql);
            echo '<table border="1"><tr><th>Name</th><th>Street</th><th>City</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                echo '<tr><td>' . $result['customer_name'] . '</td><td>' . $result['customer_street'] . '</td><td>' . $result['customer_city'] . '</td><td><a href="account_detail.php?uid=' . $result['customer_name'] . '">View Details</a></td></tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</body>

</html>