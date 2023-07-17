<?php
require_once "functions/mainPageHandler.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <header class="container-fluid d-flex justify-content-center align-items-center py-3">
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
          <li class="list-unstyled me-3">
            <a href="index.php" class="text-decoration-none d-flex flex-row justify-content-center align-items-center bg-primary px-3 py-1 rounded-5">
              <div>
                <i class="bi bi-house-door-fill fs-5 text-light"></i>
              </div>
              <div class="ms-2">
                <p class="fw-medium text-light">Home</p>
              </div>
            </a>
          </li>
          <li class="list-unstyled">
            <a href="" class="text-decoration-none d-flex flex-row justify-content-center align-items-center bg-primary px-3 py-1 rounded-5">
              <div>
                <i class="bi bi-send-fill fs-5 text-light"></i>
              </div>
              <div class="ms-2">
                <p class="fw-medium text-light">Message</p>
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
</body>

</html>