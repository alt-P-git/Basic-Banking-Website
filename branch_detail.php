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
        $uid = $_GET['uid'];
        $sql = "select branch_name, branch_city, assets from branch where branch_name='" . $uid . "'";
        $res = mysqli_query($connection, $sql);
        $branch_name = '';
        $branch_city = '';
        $city = '';
        if ($result = mysqli_fetch_assoc($res)) {
            $branch_name = $result['branch_name'];
            $branch_city = $result['branch_city'];
            $assets = $result['assets'];
        ?>
            <div id="maincontainer">
                <h2>Branch details</h2>
                <table id="container">
                    <tr class="custname">
                        <td>Branch name:</td>
                        <td><?php echo $branch_name ?></td>
                    </tr>
                    <tr class="address">
                        <td>Branch city:</td>
                        <td><?php echo $branch_city ?></td>
                    </tr>
                    <tr class="city">
                        <td>Assets:</td>
                        <td><?php echo $assets ?></td>
                    </tr>
                </table>
                <a href="edit_branch.php?uid=<?php echo $uid ?>">Edit</a>
            </div>
        <?php
        } ?>
    </div>
</body>
</html>