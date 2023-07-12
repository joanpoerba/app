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
</head>
<style>
  * {
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box;
    outline: none;
  }

  body {
    height: 100vh !important;
  }
</style>

<body>
  <p>hello <?= $_SESSION["loginDatas"]["usersUsername"]; ?></p>
</body>

</html>