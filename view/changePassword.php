<?php
require_once "../functions/changePasswordFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/register.css">
</head>

<body class="container-fluid d-flex justify-content-center align-items-center">
  <section>
    <h1 class="fw-bold text-primary">App</h1>
    <p>Change your password</p>
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
      <li class="list-unstyled mt-4">
        <label for="password">Password</label><br>
        <div class="d-flex flex-row align-items-center border border-1 border-secondary rounded-2 px-2 py-1">
          <input id="passwordInput" class="border-0 w-100 text-dark" type="password" id="password" name="password" placeholder="Ganti password" autocomplete="off" autofocus required>
          <i class="eye" style="cursor: pointer;"></i>
        </div>
      </li>
      <li class="list-unstyled mt-4">
        <button class="btn w-100 btn-primary py-2" name="changePasswordButton">Ganti password</button>
        <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="register.php">Register</a></p>
      </li>
    </form>
  </section>
  <script src="../js/showPassword.js"></script>
</body>

</html>