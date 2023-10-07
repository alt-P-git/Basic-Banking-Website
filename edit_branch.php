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
    <?php
    include('connection.php');
    if (isset($_POST['update'])) {
        $branch_name = $_GET['branch_name'];
        $branch_city = $_POST['branch_city'];
        $assets = $_POST['assets'];

        $updated = mysqli_query($connection, "UPDATE branch SET branch_city='$branch_city', assets='$assets' WHERE branch_name='$branch_name'");

        if ($updated) {
            header("Location: branch_detail.php?branch_name=$branch_name");
        }
    } else {
        $branch_name = $_GET['branch_name'];
        $sql = "SELECT branch_city, assets FROM branch WHERE branch_name='" . $branch_name . "'";
        $res = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($res);
    }
    ?>
    <div class="details">

        <div id="maincontainer">
            <form method="POST">
                <h2>Edit details</h2>
                <table id="container">
                    <tr class="custname">
                        <td>Branch City:</td>
                        <td><input type="text" name="branch_city" value="<?php echo $result['branch_city'] ?>" /></td>
                    </tr>
                    <tr class="address">
                        <td>Assets:</td>
                        <td><input type="text" name="assets" value="<?php echo $result['assets'] ?>" /></td>
                    </tr>
                </table>
                <p><input type="submit" name="update" value="Update"></p>
            </form>
        </div>
    </div>
</body>

</html>