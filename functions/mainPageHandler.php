<?php

session_start();

if ($_SESSION["loginDatas"]["status"] !== true) {
  header("location: view/login.php");
}
