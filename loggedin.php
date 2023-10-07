<?php
include("auth_session.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin dashboard-Trust Bank</title>
    <link rel="stylesheet" href="form1.css" />
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
    <div class="tableContainer">
        <div class="table1">
            <p>List of Depositors</p>
            <?php
            include('./connection.php');
            $sql = "select customer_name, depositor.account_number, balance from depositor inner join account on depositor.account_number= account.account_number";
            $res = mysqli_query($connection, $sql);
            echo '<table border="1"><tr><th>Name</th><th>A/C No.</th><th> Balance</th><th>Details</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                echo '<tr><td>' . $result['customer_name'] . '</td><td>' . $result['account_number'] . '</td><td>' . $result['balance'] . '</td><td><a href="account_detail.php?uid=' . $result['customer_name'] . '">View Details</a></td></tr>';
            }
            echo '</table>';
            ?>
        </div>
        <div class="table2">
            <p>List of Borrowers</p>
            <?php
            include('./connection.php');
            $sql = "SELECT customer_name, loan_number, amount  FROM borrower NATURAL JOIN loan;";
            $res = mysqli_query($connection, $sql);
            echo '<table border="1"><tr><th>Name</th><th>Loan No.</th><th>Amount</th><th>Details</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                echo '<tr><td>' . $result['customer_name'] . '</td><td>' . $result['loan_number'] . '</td><td>' . $result['amount'] . '</td><td><a href="account_detail.php?uid=' . $result['customer_name'] . '">View Details</a></td></tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</body>

</html>