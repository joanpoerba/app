<?php
require_once "../functions/loginPasswordValidationFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/register.css">
</head>

<body class="container-fluid d-flex justify-content-center align-items-center">
  <section>
    <h1 class="fw-bold text-primary">App</h1>
    <p>welcome <?= $_SESSION["loginValidateUsername"]["usersUsername"]; ?> and enjoy our service</p>
    <form action="" method="post">
      <li class="list-unstyled mt-4">
        <label for="password">Password</label><br>
        <input class="ps-2 w-100" type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="off" autofocus required>
        <p class="text-danger" style="position: absolute;">Wrong password</p>
      </li>
      <li class="list-unstyled mt-5 d-flex flex-row justify-content-between align-items-center">
        <div>
          <input type="checkbox" id="rememberMe" name="rememberMeButton">
          <label for="rememberMe">Remember me</label>
        </div>
        <div>
          <a href="" class="text-dark text-decoration-none">Lupa password?</a>
        </div>
      </li>
      <li class="list-unstyled mt-2">
        <button class="btn w-100 btn-primary py-2" name="loginButton">Login</button>
        <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="">Register</a></p>
      </li>
    </form>
  </section>
</body>

</html>