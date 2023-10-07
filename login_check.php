<?php
include('conn.php');
$userid=$_POST['userid'];
$pass=$_POST['pass'];
$sql="select * from master_login where userid='$userid' and passwd='$pass' ";
$res=mysqli_query($conn,$sql);
if($result=mysqli_fetch_assoc($res))
{
session_start();
$_SESSION['userid']=$result['userid'];
header('location:loggedin.php'); // (use the name you gave to page created in Assignment 7)
}
else
{ header('location:login.php'); }
?>