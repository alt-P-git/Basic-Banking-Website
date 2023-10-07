<?php
include("auth_session.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit branch-Trust Bank</title>
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
        $uid = $_GET['uid'];
        $branch_name = $_POST['branch_name'];
        $branch_city = $_POST['branch_city'];
        $assets = $_POST['assets'];
        
        $sql = "SELECT COUNT(*) as count FROM branch where branch_name = '$branch_name';";
        $res = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($res);
        if ($row['count'] > 0) {
            echo "<div id='maincontainer'>
              <h3>Branch already exists</h3><br/>
              <p class='link'>Click here to <a href='add_branch.php'>Add branch</a></p>
            </div>";
        } else {

        $updated = mysqli_query($connection, "UPDATE branch SET branch_name='$branch_name', branch_city='$branch_city', assets='$assets' WHERE branch_name='$uid'");

        if ($updated) {
            header("Location: branch_detail.php?uid=$branch_name");
        }
    }
    } else {
        $uid = $_GET['uid'];
        $sql = "SELECT branch_name, branch_city, assets FROM branch WHERE branch_name='" . $uid . "'";
        $res = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($res);
    
    ?>
    <div class="details">
        <div id="maincontainer">
            <form method="POST">
                <h2>Edit details</h2>
                <table id="container">
                <tr class="custname">
                        <td>Branch name:</td>
                        <td><input type="text" name="branch_name" value="<?php echo $result['branch_name'] ?>" /></td>
                    </tr>
                    <tr class="address">
                        <td>Branch City:</td>
                        <td><input type="text" name="branch_city" value="<?php echo $result['branch_city'] ?>" /></td>
                    </tr>
                    <tr class="city">
                        <td>Assets:</td>
                        <td><input type="number" name="assets" max="99999999" value="<?php echo $result['assets'] ?>" /></td>
                    </tr>
                </table>
                <p><input type="submit" name="update" value="Update"></p>
            </form>
        </div>
    </div>
    <?php } ?>
</body>
</html>