<?php
require_once "../functions/loginUsernameValidationFunction.php";
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
    <p>welcome and enjoy our service</p>
    <form class="mt-3" action="" method="post">
      <li class="list-unstyled">
        <label for="username">Username</label><br>
        <input class="ps-2 w-100" type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="off" autofocus required>
        <?php if (isset($loginValidateUsername)) : ?>
          <?php if ($loginValidateUsername->loginValidateUsername == false) : ?>
            <p class="text-danger" style="position: absolute;">Wrong username</p>
          <?php endif; ?>
        <?php endif; ?>
      </li>
      <li class="list-unstyled mt-5">
        <button class="btn w-100 btn-primary py-2" name="submitButton">Submit</button>
        <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="register.php">Register</a></p>
      </li>
    </form>
  </section>
</body>

</html>