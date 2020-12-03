<?php

  define('_DEFVAR', 1);

  include '../file_system.php';

  $admin = new AdminUsers\AdminUsers;
  
  $admin->Admin_Check();
  
  if (isset($_POST['submit'])) {
    $password = $_POST['pwd'];
    $username = $_POST['username'];
     
    $login = $admin->Admin_Login($username, $password);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="username" name="username">
        <input type="password" name="pwd">
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>



 
