<?php
include("auth_session.php");
?>
<html>
<body>
<h2>Branch details</h2>
<table>
  <tr>
    <td>Branch Name:</td>
    <td><?php echo $branch_name ?></td>
  </tr>
  <tr>
    <td>Branch City:</td>
    <td><?php echo $result['branch_city'] ?></td>
  </tr>
  <tr>
    <td>Assets:</td>
    <td><?php echo $result['assets'] ?></td>
  </tr>
  <tr class="edit">
    <td>Edit:</td>
    <td><a href="edit_branch.php?branch_name=<?php echo $branch_name ?>">Edit</a></td>
  </tr>
</table>
</body>
</html>