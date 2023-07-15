<?php
require_once "../functions/fakeOTPFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/fakeOTP.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="container-fluid d-flex flex-column justify-content-center align-items-center">
  <section>
    <h1 class="fw-bold text-primary">App</h1>
    <p>let's protect your account</p>
    <form class="mt-3" action="" method="post">
      <?php if ($login == null) : ?>
        <li class="list-unstyled">
          <label for="username">Username</label><br>
          <input class="ps-2 w-100 border border-1 border-secondary rounded-2 px-2 py-1 text-dark" type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="off" autofocus required>
        </li>
        <li class="list-unstyled mt-5">
          <button class="btn w-100 btn-primary py-2" name="submitButton">Submit</button>
          <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="register.php">Register</a></p>
        </li>
      <?php endif; ?>
      <?php if (isset($login)) : ?>
        <?php if ($login::$wrongUsername == true) : ?>
          <li class="list-unstyled">
            <label for="username">Username</label><br>
            <input class="ps-2 w-100 border border-1 border-secondary rounded-2 px-2 py-1 text-dark" type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="off" autofocus required>
            <p class="text-danger" style="position: absolute;">Wrong username</p>
          </li>
          <li class="list-unstyled mt-5">
            <button class="btn w-100 btn-primary py-2" name="submitButton">Submit</button>
            <p class="float-end mt-2">don't have any account?&nbsp<a class="text-dark" href="register.php">Register</a></p>
          </li>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (isset($login)) : ?>
        <?php if ($login::$wrongUsername == false) : ?>
          <li class="list-unstyled">
            <label for="username">Isi kode OTP</label><br>
            <input class="ps-2 w-100 border border-1 border-secondary rounded-2 px-2 py-1 text-dark" type="text" id="username" name="OTPInput" placeholder="Masukkan code OTP" autocomplete="off" maxlength="6" autofocus required>
          </li>
          <li class="list-unstyled mt-5">
            <button class="btn w-100 btn-primary py-2" name="submitOTPButton">Submit</button>
            <a class="getOTPCodeButton btn float-end mt-2" name="getOTPCodeButton"><u>dapatkan code OTP</u></a>
          </li>
        <?php endif; ?>
      <?php endif; ?>
    </form>
  </section>
  <section class="OTPCodePopUpWrapper position-absolute bg-light shadow-lg">
    <div class="float-end position-absolute end-0 mt-3 me-3">
      <i style="cursor: pointer;" class="exitOTPCodePopUpButton bi bi-x-lg fs-3 d-flex"></i>
    </div>
    <div style="height: 100%;" class="text-center d-flex flex-column justify-content-center align-items-center my-5">
      <div>
        <p>Your OTP code</p>
      </div>
      <div class="mt-2">
        <p class="OTPCode fw-bold text-primary"><?= $OTPCode->getOTPCode()[0]; ?></p>
      </div>
    </div>
  </section>
  <?php if (isset($CheckOTPInput)) : ?>
    <?php if ($CheckOTPInput->wrongOTP == true) : ?>
      <section class="WrongOTPCodePopUpWrapper position-absolute bg-light shadow-lg">
        <div class="float-end position-absolute end-0 mt-3 me-3">
          <i style="cursor: pointer;" class="exitWrongPopUp bi bi-x-lg fs-3 d-flex" onclick="WrongOTPCodePopUpWrapper()"></i>
        </div>
        <div style="height: 100%;" class="text-center d-flex flex-column justify-content-center align-items-center my-5">
          <div>
            <img class="img-fluid w-25" src="../asset/wrong.png" loading="lazy" alt="wrong otp">
          </div>
          <div class="mt-3">
            <p class="fs-5 fst-italic fw-semibold text-danger">Wrong OTP code</p>
          </div>
        </div>
      </section>
    <?php endif; ?>
  <?php endif; ?>
</body>
<script>
  const OTPCodePopUpWrapper = document.querySelector(".OTPCodePopUpWrapper");
  const button = document.querySelector(".getOTPCodeButton");
  const exitOTPCodePopUpButton = document.querySelector(".exitOTPCodePopUpButton");

  OTPCodePopUpWrapper.style.display = "none";

  button.addEventListener("click", () => {
    OTPCodePopUpWrapper.style.display = "block";
  })

  exitOTPCodePopUpButton.addEventListener("click", () => {
    OTPCodePopUpWrapper.style.display = "none";
  })

  function WrongOTPCodePopUpWrapper() {
    const WrongOTPCodePopUpWrapper = document.querySelector(".WrongOTPCodePopUpWrapper");
    const exitWrongPopUp = document.querySelector(".exitWrongPopUp");

    WrongOTPCodePopUpWrapper.style.display = "none";
  }
</script>

</html>