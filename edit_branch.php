<?php
include("auth_session.php");
?>
<?php
include('connection.php');
if(isset($_POST['update']))
{
    $branch_name = $_GET['branch_name'];
    $branch_city=$_POST['branch_city'];
    $assets=$_POST['assets'];

    $updated = mysqli_query($connection, "UPDATE branch SET branch_city='$branch_city', assets='$assets' WHERE branch_name='$branch_name'");

    if($updated)
    {
        header("Location: branch_detail.php?branch_name=$branch_name");
    }
}
else
{
    $branch_name = $_GET['branch_name'];
    $sql = "SELECT branch_city, assets FROM branch WHERE branch_name='" . $branch_name . "'";
    $res = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($res);
}
?>
<html>
<body>
<form method="POST">
  <label>Branch City:</label><input type="text" name="branch_city" value="<?php echo $result['branch_city'] ?>"/>
  <label>Assets:</label><input type="text" name="assets" value="<?php echo $result['assets'] ?>"/>
  <input type="submit" name="update" value="Update">
</form>
</body>
</html>