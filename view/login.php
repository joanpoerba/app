<?php
require_once "../functions/loginFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/form.css">
</head>

<body class="container-fluid d-flex justify-content-center align-items-center">
  <section>
    <h1 class="fw-bold text-primary">App</h1>
    <p>welcome and enjoy our service</p>
    <form class="mt-3" action="" method="post">
      <li class="list-unstyled">
        <label for="username">Username</label><br>
        <input class="ps-2 w-100 border border-1 border-secondary rounded-2 px-2 py-1 text-dark" type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="off" autofocus required>
        <?php if (isset($login->wrongUsername)) : ?>
          <?php if ($login->wrongUsername == true) : ?>
            <p class="text-danger" style="position: absolute;">Wrong username</p>
          <?php endif; ?>
        <?php endif; ?>
      </li>
      <li class="list-unstyled mt-4">
        <label for="password">Password</label><br>
        <div class="d-flex flex-row align-items-center border border-1 border-secondary rounded-2 px-2 py-1">
          <input id="passwordInput" class="border-0 w-100 text-dark" type="password" id="password" name="password" placeholder="Ganti password" autocomplete="off" required>
          <i class="eye" style="cursor: pointer;"></i>
        </div>
        <?php if (isset($login->wrongPassword)) : ?>
          <?php if ($login->wrongPassword == true) : ?>
            <p class="text-danger" style="position: absolute;">Wrong password</p>
          <?php endif; ?>
        <?php endif; ?>
      </li>
      <li class="list-unstyled mt-4 d-flex flex-row justify-content-between align-items-center">
        <div>
          <input type="checkbox" id="rememberMe" name="rememberMeButton">
          <label for="rememberMe">Remember me</label>
        </div>
        <div>
          <a href="fakeOTP.php" class="text-dark text-decoration-none">Lupa password?</a>
        </div>
      </li>
      <li class="list-unstyled mt-2">
        <button class="btn w-100 btn-primary py-2" name="loginButton">Login</button>
        <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="register.php">Register</a></p>
      </li>
    </form>
  </section>
  <script src="../js/showPassword.js"></script>
</body>

</html>