<?php
include("auth_session.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All branches-Trust Bank</title>
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
    
    <div class="tableContainer" style="margin-top: 200px;">
        <div class="table1"  style="margin-top: 100px;">
            <p>List of all Branches</p>
            <?php
            include('./connection.php');
            $sql = "select * FROM branch";
            $res = mysqli_query($connection, $sql);
            echo '<table border="1"><tr><th>Branch Name</th><th>Branch City</th><th>Assets</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                echo '<tr><td>' . $result['branch_name'] . '</td><td>' . $result['branch_city'] . '</td><td>' . $result['assets'] . '</td><td><a href="branch_detail.php?uid=' . $result['branch_name'] . '">View Details</a></td></tr>';
            }
            echo '</table>';
            ?>
            <p><a href="./add_branch.php">Add branch</a></p>
        </div>
    </div>
</body>
</html>