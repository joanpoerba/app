<?php
require_once "functions/mainPageHandler.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App | <?= $_SESSION["loginDatas"]["usersUsername"]; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <header class="container-fluid position-fixed d-flex justify-content-center align-items-center py-3">
    <section class="container-lg d-flex flex-row justify-content-between align-items-center">
      <div class="d-flex flex-row align-items-center">
        <div>
          <h2 class="fw-bold text-primary">App</h2>
        </div>
        <div class="ms-2">
          <form action="" method="post">
            <input style="background: #f5f5f5 !important;" class="rounded-1 border-0 px-2 py-1 text-dark" type="text" name="test" placeholder="# Explore" autocomplete="off" autofocus>
          </form>
        </div>
      </div>
      <nav>
        <ul class="d-flex flex-row justify-content-end align-items-center">
          <li class="list-unstyled">
            <a href="index.php" class="text-decoration-none d-flex flex-row justify-content-center align-items-center bg-primary px-3 py-1 rounded-5">
              <div>
                <i class="bi bi-house-door-fill fs-5 text-light"></i>
              </div>
              <div class="ms-2">
                <p style="cursor: pointer;" class="fw-medium text-light">Home</p>
              </div>
            </a>
          </li>
          <li class="list-unstyled mx-3">
            <a class="text-decoration-none d-flex flex-row justify-content-center align-items-center bg-primary px-3 py-1 rounded-5" onclick="showNotFoundPage()">
              <div>
                <i class="bi bi-send-fill fs-5 text-light"></i>
              </div>
              <div class="ms-2 nonActive">
                <p style="cursor: pointer;" class="fw-medium text-light">Message</p>
              </div>
            </a>
          </li>
          <li class="list-unstyled">
            <a class="text-decoration-none d-flex flex-row justify-content-center align-items-center bg-primary px-3 py-1 rounded-5" onclick="showNotFoundPage()">
              <div>
                <i class="bi bi-gear-fill fs-5 text-light"></i>
              </div>
              <div class="ms-2 nonActive">
                <p style="cursor: pointer;" class="fw-medium text-light">Setting</p>
              </div>
            </a>
          </li>
          <li class="list-unstyled mx-3">
            <div style="background: #d1d1d1 !important;" class="line"></div>
          </li>
          <li class="list-unstyled usersPhotoProfileWrapper px-1 py-1 rounded-5">
            <a href="" class="text-dark text-decoration-none">
              <div class="d-flex flex-row align-items-center">
                <div>
                  <img class="usersPhotoProfile" src="asset/unknownPp.png" alt="">
                </div>
                <div class="mx-3">
                  <p><?= $_SESSION["loginDatas"]["usersUsername"]; ?></p>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </nav>
    </section>
  </header>
  <section class="notFoundWrapper container-fluid position-absolute h-100 justify-content-center align-items-center">
    <section class="notFound position-absolute bg-light shadow-lg">
      <div class="float-end position-absolute end-0 mt-3 me-3">
        <i style="cursor: pointer;" class="exitPopUpButton bi bi-x-lg fs-3 d-flex"></i>
      </div>
      <div style="height: 100%;" class="d-flex flex-column justify-content-center align-items-center my-4">
        <img class="img-fluid w-75" src="asset/404 Error-cuate.svg" loading="lazy" alt="wrong otp">
        <div class="mt-3">
          <p class="fs-5 fst-italic fw-semibold text-primary">Maaf halaman belum di buat :(</p>
        </div>
      </div>
    </section>
  </section>
</body>
<script>
  const notFoundWrapper = document.querySelector(".notFoundWrapper");
  const exitPopUpButton = document.querySelector(".exitPopUpButton");

  notFoundWrapper.style.display = "none";

  function showNotFoundPage() {
    notFoundWrapper.style.display = "flex";
  }

  exitPopUpButton.addEventListener("click", () => {
    notFoundWrapper.style.display = "none";
  })
</script>

</html>