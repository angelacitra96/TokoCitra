<?php
require_once "Admin/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login User</h2>
  <form action="Admin/prosesLoginUser.php" method="POST">
    <div class="form-group">
      <label for="namaUser">Username:</label>
      <input type="text" class="form-control"  placeholder="Enter username" name="namaUser" style="width: 250px">
    </div>
    <div class="form-group">
      <label for="passwordUser">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="passwordUser" style="width: 250px">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>




</body>
</html>